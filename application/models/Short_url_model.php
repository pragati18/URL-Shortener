<?php

class Short_url_model extends CI_Model {

    function store_long_url()
    {
    	$this->form_validation->set_rules('url', 'URL', 'trim|prep_url|required|min_length[5]|max_length[1000]|xss_clean'); //set rules to URL
        $query=$this->db->get_where('urls', array('long_url'=> $this->input->post('url')));
    	if($query->num_rows()>0)
    	{
            $counter=0;
    		foreach ($query->result() as $row)
			{
			    return str_replace('=','-', base64_encode($row->id)); //
			}
    	}

    	if($this->form_validation->run())
    	{
    		$this->db->insert('urls', array('long_url'=>$this->input->post('url'),'counter'=>1)); //insert data
            $var_id=str_replace('=','-', base64_encode($this->db->insert_id())); //encode id
    		return str_replace('=','-', base64_encode($this->db->insert_id())); //return shore URL to home page
    	}
    }
	
    /*Get long Url*/
    function get_long_url($shorty='')
    {
    	$query=$this->db->get_where('urls', array('id'=> base64_decode(str_replace('-','=', $shorty))));
    	if($query->num_rows()>0)
    	{
    		foreach ($query->result() as $row)
			{
			    $counter=++$row->counter;
                $data=array('counter'=>$counter);
                $this->db->where('id',$row->id);
                $this->db->update('urls',$data);
                return $row->long_url;
			}
    	}
    	return '/error_404';
    }

    /*Get all URLs*/
	function get_all_url($table)
    {
        $results = array();
		$this->db->select('id, long_url,counter');
		$this->db->from($table);
		$this->db->order_by('counter', 'desc');
		$query = $this->db->get();
        // echo  $this->db->last_query();exit;
		
      if($query->num_rows() > 0) {
         $results = $query->result();
         //print_r($results);exit;
        }
      return $results;
    	
    }
    
	

}
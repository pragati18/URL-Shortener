<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shorten extends CI_Controller { //Shorten extends CI -note the capital S

    public function index() //called by default
    {
        $data=array(); //data to be sent to the view.
        if($this->input->post('url'))//did the user post a URL to be shorten?
        {
            $this->load->model('short_url_model');//load the model which deals with data for short URLs
			$this->load->helper('security');  //XSS Error Security
            $short_url=$this->short_url_model->store_long_url(); //store the URL and get back the shorten URL
            if($short_url) //using PHP's awesome power
            {
                $data['short_url']=$short_url;
            }
            else //there was an error
            {
                $data['error']=validation_errors();
            }
        }
		
        $this->load->model('short_url_model'); 
        $data ['data']= $this->short_url_model->get_all_url('urls');
        //print_r($data1);
        $this->load->view('input_url', $data);//load the single view input_url and send any data to it
    }

    public function get_all_data()
    {
        $this->load->model('short_url_model'); 
        $data1 = $this->short_url_model->get_all_url('urls');
        print_r($data1);exit;
        $this->load->view('input_url', $data1);//load the view get_all_url and send any data to it
    }
    public function get_shorty() //this function is called by the routes file using the 404_override 🙂
    {
        $this->load->model('short_url_model'); //load the model for dealing with short URLs
        $shorty=$this->uri->segment(1);//get the segment the user requested e.g. Nw from http://short.local/Nw
         redirect($this->short_url_model->get_long_url($shorty));//direct the user to the long URL the short URL is connected to 🙂 MAGIC
    }

    public function error_404() //a little error for when users enter an invalid short URL
    {
        $data['error']='Whoops cannot find that URL!';
        $this->load->view('input_url', $data);//load our single view 🙂
    }
}
<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Url Shortener</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

		  <!--[For Plugins external css]-->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins.css" />
        <!--custom css -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css" />
        <!--Responsive css-->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.dataTables.min.css" />
        <script src="<?php echo base_url();?>assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>	
    </head>
    
	<body data-spy="scroll" data-target="#main-navbar">
	<!-- loader-->
		<div class='preloader'>
				<div class='loaded'>&nbsp;
				</div>
		</div>
          <div id="menubar" class="main-menu">	
            <nav class="navbar navbar-default navbar-fixed-top"  >
                <div class="container">
                    <div class="navbar-header"> 
                       <h5>Created A Demo Url Shoterner</h5>
                          
                    </div>   
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <!--Home page style-->
        <header id="home" class="sections">
            <div class="container">
                <div class="row">
                    <div class="homepage-style">
                        <div class="top-arrow hidden-xs text-center"><img src="assets/images/top-arrow.png" alt="" /></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="unique-apps">
                                <h2>Start for FREE!</h2>
                                <p>
                                   Brand, track and optimize every touchpoint with using this application, the world's leading link management platform.
                                </p>

								<div class="home-btn">  
									<form action="<?php echo base_url();?>" method="post" accept-charset="utf-8">
											<input type="text" name="url" value="" placeholder="Enter Your Long URL..." class="url_css" required>
											<button type="submit" class="btn btn-primary btn_css" >Get Shorty<span><i class="fa fa-paper-plane"></i></span></button>
									</form>
									<br/>
									<!--Ddisplay Shorener URL and Error if any-->
									<?php
									if(isset($short_url))
									{
										//echo '<a href="'.base_url().$short_url.'" target="_blank"  class="shorty_url alert alert-success" style="margin-top:2%;">'.base_url().$short_url.'</a>'; ?>


									<input type="text" value="<?php echo base_url().$short_url;?>" id="myInput"  class="shorty_url alert alert-success" style="color:black;width: 60%;" readonly>
									<button class="my_btn" id="my_btn" onclick="myFunction();">Copy</button>
									<?php }



									if(isset($error))
									{
										echo '<div class="errors alert alert-danger">'.$error.'</div>';
									}
									?>
								</div>
                            </div>
                        </div>
						
                        <!--Baner images-->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="slider-area">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner1" role="listbox">
                                        <div class="item active">
                                            <img src="assets/images/SC1.png" alt="Url Shoterner" />
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        </header>

		
        <section id="urls" class="sections">
            <div class="container text-center">
                <div class="heading">
                    <div class="title text-center arrow-left"><br/>
                        <img class="hidden-xs" src="assets/images/left-arrow.png" alt="" />
                        <h4 class="">Top 100 URLs </h4>
                    </div>
                </div>	

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="main-works">
							<div class="form-group">
								<fieldset>	
									<div class="table-responsive">
										<div class="table-responsive">                            
											<table id="escalation" class="table table-striped table-bordered" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>Sr.No.</th>
														<!--<th>Long Url</th>-->
														<th>Short Url</th>
														<th>Count</th>
														
													</tr>
												</thead>
												<tbody>
													<?php
													if (is_array($data)){
														$count=1;
														foreach($data as $url) 
														{ 
														//print_r($url);
													?>
													<tr>
														<td><?php echo $count;?></td>
														<!--<td><?php //echo $url->long_url;?></td>-->
														<td title="<?php echo $url->long_url;?>"><a href="<?php echo base_url()."".str_replace('=','-', base64_encode($url->id));?>" target="_blank"><?php echo base_url()."".str_replace('=','-', base64_encode($url->id));?></a></td>
														<td><?php echo $url->counter; ?></td>
														<?php $count++;}  }?>                   
													</tr>                                
												</tbody>
											</table>
										</div>
									</div>
							    </fieldset>
							</div>
						</div>
					</div>
				</div>
             </div>	    
        </section>

      
        <!--Footer-->
        <footer id="footer" class="footer footer1">
            <div class="container">
                <div class="row">
                    <div class="socio-copyright">
                        <p>Made By <a target="_blank" href="https://www.linkedin.com/in/pragati-gaikwad-31b25724/"> Pragati Gaikwad</a> 2018</p>
                    </div>
                </div>	
            </div>
        </footer>

		<!-- script files-->
        <script src="<?php echo base_url();?>assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url();?>assets/js/main.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		 
        <!--Script for table-->		 
		  <script>
			$(document).ready(function () {
			$('#escalation').DataTable();
			  });
		  </script>
	
         <!-- copy script-->
		<script>
		  function myFunction() {
		  var copyText = document.getElementById("myInput");
		  copyText.select();
		  document.execCommand("Copy");
		 // alert("Copied the text: " + copyText.value);
		 document.getElementById('my_btn').innerHTML = 'Copied';
		}
		</script>

    </body>
</html>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="refresh" content="3; url=<?= $url->base_url() ?>" />
	
    <title>Tips Message</title>    

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= $url->base_url('static/') ?>assets/img/favicon.png">
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/fonts/themify-icons.css"> 
	<link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/fonts/font-awesome.min.css" type="text/css"> 
	<link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/css/sweetalert.css" type="text/css"> 
    <link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/css/bootstrap.min.css" type="text/css">    
    <link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/css/jasny-bootstrap.min.css" type="text/css">  
    <link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/css/bootstrap-select.min.css" type="text/css">  
    <!-- Material CSS -->
    <link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/css/material-kit.css" type="text/css">
    <!-- Font Awesome CSS -->
    

    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/extras/owl.theme.css" type="text/css">
    <!-- Rev Slider CSS -->
    <link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/extras/settings.css" type="text/css"> 
    <!-- Slicknav js -->
    <link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/css/slicknav.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/css/main.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="<?= $url->base_url('static/') ?>assets/css/responsive.css" type="text/css">

    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="<?= $url->base_url('static/') ?>assets/css/colors/red.css" media="screen" />
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/jquery-min.js"></script>      
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/sweetalert.min.js"></script>
  </head>

  <body>  
      <!-- Header Section Start -->
      <div class="header">    
        <div class="logo-menu">
          <nav class="navbar navbar-default main-navigation" role="navigation" data-spy="affix" data-offset-top="50">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>

              <div class="collapse navbar-collapse" id="navbar">        
                   <!-- Start Navigation List -->
                  <ul class="nav navbar-nav">
                    <li>
                      <a class="active" href="<?= $url->site_url('index/index')?>">
                      Home
                      </a>
                    </li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right float-right">
					<li class="left"><a href="<?= $url->site_url('index/post')?>"><i class="ti-pencil-alt"></i> Post A Job</a></li>
                  </ul>
                </div>
            </div>
            <!-- Mobile Menu Start -->
            <ul class="wpb-mobile-menu">
              <li>
                <a class="active" href="<?= $url->site_url('index/index')?>">Home</a>                   
              </li>
               
				<li class="btn-m"><a href="<?= $url->site_url('index/post')?>"><i class="ti-pencil-alt"></i> Post A Job</a></li>
		  
            </ul>
            <!-- Mobile Menu End --> 
          </nav>
		  
      </div>
	  </div>
      <!-- Header Section End -->    









	<section class="category section">
        <div class="container">
          <h2 class="section-title">Message</h2>  
          <div class="row">
            <div class="col-md-12">
			
			<div class="content-box-large box-with-header" style="background: #ffffff; padding: 45px; font-size: 22px; height:50%">
				<?= $message ?>
				<br><br>
				<p><a href="<?= $url->base_url() ?>">Click to Jump</a></p>
			</div>
			
            </div> 
          </div>
        </div>
    </section>

		
		
		
		<!-- Footer Section Start -->
    <footer>
      <section class="footer-Content">
          <div class="container">
            <div class="row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="widget">
                  <div class="textwidget">
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="widget">
                  <h3 class="block-title">Quick Links</h3>
                  <ul class="menu">
                    <li><a href="#">About Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="widget">
                  <h3 class="block-title">Follow Us</h3>
                  <div class="bottom-social-icons social-icon">  
                    <a class="twitter" href="https://twitter.com/#"><i class="ti-twitter-alt"></i></a>
                    <a class="facebook" href="https://web.facebook.com/#"><i class="ti-facebook"></i></a>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </section>
		
      <!-- Copyright Start  -->
      <div id="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="site-info text-center">
                <p>All Rights reserved &copy; 2018</p>
              </div>   
            </div>
          </div>
        </div>
      </div>
      <!-- Copyright End -->

    </footer>
	
    <!-- Main JS  -->
      
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/material.min.js"></script>
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/material-kit.js"></script>
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/jquery.parallax.js"></script>
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/jquery.slicknav.js"></script>
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/main.js"></script>
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/form-validator.min.js"></script>
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/contact-form-script.js"></script>    
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?= $url->base_url('static/') ?>assets/js/jquery.themepunch.tools.min.js"></script>
  </body>
</html>
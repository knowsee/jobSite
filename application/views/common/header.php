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
        <meta name="author" content="Jobboard">

        <title>Found your best job --- Job!</title>    

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= base_url('static/') ?>assets/img/favicon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/fonts/themify-icons.css"> 
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/fonts/font-awesome.min.css" type="text/css"> 
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/sweetalert.css" type="text/css"> 
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/bootstrap.min.css" type="text/css">    
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/jasny-bootstrap.min.css" type="text/css">  
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/bootstrap-select.min.css" type="text/css">  
        <!-- Material CSS -->
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/material-kit.css" type="text/css">
        <!-- Font Awesome CSS -->


        <!-- Animate CSS -->
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/extras/animate.css" type="text/css">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/extras/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/extras/owl.theme.css" type="text/css">
        <!-- Slicknav js -->
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/slicknav.css" type="text/css">
        <!-- Main Styles -->
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/main.css" type="text/css">
        <!-- Responsive CSS Styles -->
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/responsive.css" type="text/css">
        <!-- Editor -->
        <link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/et/froala_editor.min.css" type="text/css"> 
        <!-- Color CSS Styles  -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('static/') ?>assets/css/colors/yellow.css" media="screen" />
        <script type="text/javascript" src="<?= base_url('static/') ?>assets/js/jquery-min.js"></script>      
        <script type="text/javascript" src="<?= base_url('static/') ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= base_url('static/') ?>assets/js/sweetalert.min.js"></script>
        <script>
            var oToken = '<?= $this->security->get_csrf_hash() ?>';
            var oTokenName = '<?= $this->security->get_csrf_token_name() ?>';
            var loadView = false;
            $(document).on('submit', function (e) {
                //e.preventDefault();
            });
			
        </script>
		
		<script>
		<?php $stringKeyword = "'".implode("','", $this->config->item('JobType'))."'"; ?>
		var stringKeyword = [
			<?=$stringKeyword?>
		];
		</script>
        <style>
            .navbar-nav a .notinumber {
                float: right;
                margin: 0 0 0 8px;
                width: 20px;
                height: 20px;
                background: #ff4f57;
                text-align: center;
                border-radius: 50px;
                color: #fff;
            }
            .navbar-nav a.active .notinumber {
                background: #fff;
                color: #ff4f57
            }
        </style>
    </head>

    <body>  
        <!-- Header Section Start -->
        <div class="header">    
            <div class="logo-menu">
                <nav class="navbar navbar-default main-navigation">
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
                                    <a <?php getStyleMethod(array('index', 'index')) ?> href="<?= site_url('index/index') ?>">
                                        Home
                                    </a>
                                </li>
								<li>
                                    <a <?php getStyleMethod(array('index', 'cate')) ?> href="<?= site_url('index/cate') ?>">
                                        Catetory
                                    </a>
                                </li>
                                <?php if ($this->userInfo->userType == 2): ?>
                                    <li>
                                        <a <?php getStyleMethod(array('index', 'notification')) ?> href="<?= site_url('index/notification') ?>">
                                            Notification <?= $this->userInfo->notifitionNum > 0 ? '<span class="notinumber">' . $this->userInfo->notifitionNum . '</span>' : '' ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" <?php getStyleMethod(array('ManagerCompany')) ?>>
                                            Manager <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="<?= site_url('ManagerCompany/joblist') ?>">
                                                    Manage Jobs
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= site_url('ManagerCompany/edit') ?>">
                                                    Company Information
                                                </a>                          
                                            </li>
                                            <li>
                                                <a href="<?= site_url('ManagerCompany/applylist') ?>">
                                                    Manage Applications
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
									<li>
                                        <a <?php getStyleMethod(array('index', 'post')) ?> href="<?= site_url('index/post') ?>">
                                            Post A Job
                                        </a>
                                    </li>
                                <?php elseif ($this->userInfo->userType == 1): ?>
                                    <li>
                                        <a <?php getStyleMethod(array('index', 'notification')) ?> href="<?= site_url('index/notification') ?>">
                                            Notification <?= $this->userInfo->notifitionNum > 0 ? '<span class="notinumber">' . $this->userInfo->notifitionNum . '</span>' : '' ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a <?php getStyleMethod(array('Seeker', 'resumeView')) ?> href="<?= site_url('Seeker/resumeView') ?>">
                                            My Resume
                                        </a>
                                    </li>
                                    <li>
                                        <a <?php
                                        getStyleMethodCall(function($dir, $m, $a) {
                                            if ($m == 'Seeker' && $a !== 'resumeView') {
                                                return true;
                                            } else {
                                                return false;
                                            }
                                        })
                                        ?> href="<?= site_url('Seeker/index') ?>">
                                            My Center <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="<?= site_url('Seeker/apply') ?>">
                                                    My Apply
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= site_url('Seeker/resume') ?>">
                                                    Manager Resume
                                                </a>                          
                                            </li>
                                            <li>
                                                <a href="<?= site_url('Seeker/alert') ?>">
                                                    Job Invite
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= site_url('Seeker/recommended') ?>">
                                                    Job Recommended
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <ul class="nav navbar-nav navbar-right float-right">
                                <?php if ($this->userInfo->userId): ?>
                                    <li class="right"><p style="margin:0 10px; line-height: 22px; font-size: 14px;"> Welcome back ! <br> <strong>[<?= $this->userInfo->userTypeName ?>]<?= $this->userInfo->userName ?></strong> </p></li>
                                <?php endif; ?>
                                
                                <?php if ($this->userInfo->userId): ?>
                                    <li class="right"><a href="<?= site_url('index/logout') ?>"><i class="ti-lock"></i> Log Out</a></li>
                                <?php else: ?>
                                    <li class="right"><a href="<?= site_url('index/login') ?>"><i class="ti-lock"></i>  Log In</a></li>
									
									<li class="right"><a href="<?= site_url('index/reghtml') ?>"><i class="ti-lock"></i>  Reg User</a></li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu Start -->
                    <ul class="wpb-mobile-menu">
                        <li><a href="#">Welcome back ! <?= $this->userInfo->userName ?></a></li>
                        <li>
                            <a <?php getStyleMethod(array('index', 'index')) ?> href="<?= site_url('index/index') ?>">
                                Home
                            </a>
                        </li>
						<li>
							<a <?php getStyleMethod(array('index', 'cate')) ?> href="<?= site_url('index/cate') ?>">
								Catetory
							</a>
						</li>
                        <li>
                            <a <?php getStyleMethod(array('index', 'notification')) ?> href="<?= site_url('index/notification') ?>">
                                Notification
                            </a>
                        </li>
                        <?php if ($this->userInfo->userType == 2): ?>
							<li><a href="<?= site_url('index/post') ?>">Post A Job</a></li>
                            <li>
                                <a href="#" <?php getStyleMethod(array('ManagerCompany')) ?>>
                                    Manager
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= site_url('ManagerCompany/joblist') ?>">
                                            Manage Jobs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('ManagerCompany/edit') ?>">
                                            Company Information
                                        </a>                          
                                    </li>
                                    <li>
                                        <a href="<?= site_url('ManagerCompany/applylist') ?>">
                                            Manage Applications
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php elseif ($this->userInfo->userType == 1): ?>
                            <li>
                                <a <?php
                                getStyleMethodCall(function($dir, $m, $a) {
                                    if ($m == 'Seeker' && $a !== 'resumeView') {
                                        return true;
                                    } else {
                                        return false;
                                    }
                                })
                                ?> href="<?= site_url('Seeker/index') ?>">
                                    My Center
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= site_url('Seeker/apply') ?>">
                                            My Apply
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('Seeker/resume') ?>">
                                            Manager Resume
                                        </a>                          
                                    </li>
                                    <li>
                                        <a href="<?= site_url('Seeker/alert') ?>">
                                            Job Invite
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('Seeker/recommended') ?>">
                                            Job Recommended
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a <?php getStyleMethod(array('Seeker', 'resumeView')) ?> href="<?= site_url('Seeker/resumeView') ?>">
                                    My Resume
                                </a>
                            </li>
                        <?php endif; ?>
                        
                        <?php if ($this->userInfo->userId): ?>
                            <li class="btn-m"><a href="<?= site_url('index/logout') ?>"><i class="ti-lock"></i> Log Out</a></li>
                        <?php else: ?>
                            <li class="btn-m"><a href="<?= site_url('index/login') ?>"><i class="ti-lock"></i> Log In</a></li>
                            <?php endif; ?>
                    </ul>
                    <!-- Mobile Menu End --> 
                </nav>

            </div>
        </div>
        <!-- Header Section End -->
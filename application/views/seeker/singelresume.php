<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <title>My CV</title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <!-- Global CSS -->
        <link rel="stylesheet" href="<?= base_url('static/') ?>job_singel_assets/plugins/bootstrap/css/bootstrap.min.css">   
        <!-- Plugins CSS -->
        <link rel="stylesheet" href="<?= base_url('static/') ?>job_singel_assets/plugins/font-awesome/css/font-awesome.css">

        <!-- Theme CSS -->  
        <link id="theme-style" rel="stylesheet" href="<?= base_url('static/') ?>job_singel_assets/css/styles.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head> 

    <body>
        <div class="wrapper">
            <div class="sidebar-wrapper">
                <div class="profile-container">
                    <img class="profile" src="<?= base_url('static/') ?>job_singel_assets/images/profile.png" alt="" />
                    <h1 class="name"><?= $resume->realName ?></h1>
                    <h3 class="tagline"><?= getConfigValue('jobAward', $resume->award) ?></h3>
                </div><!--//profile-container-->

                <div class="contact-container container-block">
                    <ul class="list-unstyled contact-list">
                        <li class="email"><i class="fa fa-envelope"></i><a href="mailto: yourname@email.com"><?= $resume->email ?></a></li>
                        <li class="phone"><i class="fa fa-phone"></i><a href="tel:<?= $resume->phone ?>"><?= $resume->phone ?></a></li>
                    </ul>
                </div><!--//contact-container-->
                <div class="education-container container-block">
                    <h2 class="container-block-title">Education</h2>
                    <div class="item">
                        <h4 class="degree">MSc in Computer Science</h4>
                        <h5 class="meta">University of London</h5>
                        <div class="time">2011 - 2012</div>
                    </div><!--//item-->
                    <div class="item">
                        <h4 class="degree">BSc in Applied Mathematics</h4>
                        <h5 class="meta">Bristol University</h5>
                        <div class="time">2007 - 2011</div>
                    </div><!--//item-->
                </div><!--//education-container-->

                <div class="languages-container container-block">
                    <h2 class="container-block-title">Languages</h2>
                    <ul class="list-unstyled interests-list">
                        <li>English <span class="lang-desc">(Native)</span></li>
                        <li>French <span class="lang-desc">(Professional)</span></li>
                        <li>Spanish <span class="lang-desc">(Professional)</span></li>
                    </ul>
                </div><!--//interests-->

                <div class="interests-container container-block">
                    <h2 class="container-block-title">Interests</h2>
                    <ul class="list-unstyled interests-list">
                        <li>Climbing</li>
                        <li>Snowboarding</li>
                        <li>Cooking</li>
                    </ul>
                </div><!--//interests-->

            </div><!--//sidebar-wrapper-->

            <div class="main-wrapper">

                <section class="section summary-section">
                    <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                    <div class="summary">
                        <p>Summarise your career here lorem ipsum dolor sit amet, consectetuer adipiscing elit. You can <a href="http://themes.3rdwavemedia.com/website-templates/orbit-free-resume-cv-template-for-developers/" target="_blank">download this free resume/CV template here</a>. Aenean commodo ligula eget dolor aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu.</p>
                    </div><!--//summary-->
                </section><!--//section-->

                <section class="section experiences-section">
                    <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>

                    <div class="item">
                        <div class="meta">
                            <div class="upper-row">
                                <h3 class="job-title">Lead Developer</h3>
                                <div class="time">2015 - Present</div>
                            </div><!--//upper-row-->
                            <div class="company">Startup Hubs, San Francisco</div>
                        </div><!--//meta-->
                        <div class="details">
                            <p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo.</p>  
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                        </div><!--//details-->
                    </div><!--//item-->

                    <div class="item">
                        <div class="meta">
                            <div class="upper-row">
                                <h3 class="job-title">Senior Software Engineer</h3>
                                <div class="time">2014 - 2015</div>
                            </div><!--//upper-row-->
                            <div class="company">Google, London</div>
                        </div><!--//meta-->
                        <div class="details">
                            <p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>  

                        </div><!--//details-->
                    </div><!--//item-->

                    <div class="item">
                        <div class="meta">
                            <div class="upper-row">
                                <h3 class="job-title">UI Developer</h3>
                                <div class="time">2012 - 2014</div>
                            </div><!--//upper-row-->
                            <div class="company">Amazon, London</div>
                        </div><!--//meta-->
                        <div class="details">
                            <p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>  
                        </div><!--//details-->
                    </div><!--//item-->

                </section><!--//section-->

                <section class="section projects-section">
                    <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                    <div class="intro">
                        <p>You can list your side projects or open source libraries in this section. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et ligula in nunc bibendum fringilla a eu lectus.</p>
                    </div><!--//intro-->
                    <div class="item">
                        <span class="project-title"><a href="#hook">Velocity</a></span> - <span class="project-tagline">A responsive website template designed to help startups promote, market and sell their products.</span>

                    </div><!--//item-->
                    <div class="item">
                        <span class="project-title"><a href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-web-development-agencies-devstudio/" target="_blank">DevStudio</a></span> - 
                        <span class="project-tagline">A responsive website template designed to help web developers/designers market their services. </span>
                    </div><!--//item-->
                    <div class="item">
                        <span class="project-title"><a href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-startups-tempo/" target="_blank">Tempo</a></span> - <span class="project-tagline">A responsive website template designed to help startups promote their products or services and to attract users &amp; investors</span>
                    </div><!--//item-->
                    <div class="item">
                        <span class="project-title"><a href="hhttp://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-mobile-apps-atom/" target="_blank">Atom</a></span> - <span class="project-tagline">A comprehensive website template solution for startups/developers to market their mobile apps. </span>
                    </div><!--//item-->
                    <div class="item">
                        <span class="project-title"><a href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-mobile-apps-delta/" target="_blank">Delta</a></span> - <span class="project-tagline">A responsive Bootstrap one page theme designed to help app developers promote their mobile apps</span>
                    </div><!--//item-->
                </section><!--//section-->

                <section class="skills-section section">
                    <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                    <div class="skillset">
                        <?php $skillValue = [1 => '100', '70', '40']; ?>
                        <?php foreach ($resume->skillJson as $skill): ?>
                            <div class="item">
                                <div class="level-title">
                                    <p style="font-size: 18px;"><?= $skill['name'] ?></p>
                                    <p style="font-size: 14px;"><?= getConfigValue('perList', $skill['value']) ?></p>
                                </div>
                                <div class="level-bar" style="background: none;">
                                    <div class="progress-bar bg-info" role="progressbar" style="margin: 20px 0;width: <?= $skillValue[$skill['value']] ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>                           
                                </div><!--//level-bar-->                                 
                            </div><!--//item-->
                        <?php endforeach; ?>
                    </div>  
                </section><!--//skills-section-->

            </div><!--//main-body-->
        </div>    
    </body>
</html> 


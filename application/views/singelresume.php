<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <title>My CV</title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=1344,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
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
                        <li class="phone"><i class="fa fa-money"></i><?= getConfigValue('Csalary', $resume->salary) ?> /month</li>
                    </ul>
                </div><!--//contact-container-->
                <div class="education-container container-block">
                    <h2 class="container-block-title">Education</h2>
                    <?php foreach ($resume->resumeJson['edu'] as $id => $eduInfo): ?>
                    <div class="item">
                        <h4 class="degree">[<?= getConfigValue('jobAward', $eduInfo['award']) ?>]<?= $eduInfo['fieldname'] ?></h4>
                        <h5 class="meta"><?= $eduInfo['school'] ?></h5>
                        <div class="time"><?= $eduInfo['from'] ?>-<?= $eduInfo['end'] ?></div>
                    </div>
                    <?php endforeach; ?>
                </div><!--//education-container-->

                <div class="languages-container container-block" style="display:none;">
                    <h2 class="container-block-title">Languages</h2>
                    <ul class="list-unstyled interests-list">
                        <li>English <span class="lang-desc">(Native)</span></li>
                        <li>French <span class="lang-desc">(Professional)</span></li>
                        <li>Spanish <span class="lang-desc">(Professional)</span></li>
                    </ul>
                </div>

            </div><!--//sidebar-wrapper-->

            <div class="main-wrapper">

                <section class="section summary-section">
                    <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                    <div class="summary">
                        <p>I'm [<?= getConfigValue('jobProfessor', $resume->jobProfessor) ?>]<?= getConfigValue('JobType', $resume->jobCategory) ?>; I have <?= $resume->jobExperience ?> years work experience. thank you for your looking</p>
                    </div><!--//summary-->
                </section><!--//section-->

                <section class="section experiences-section">
                    <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>
                    <?php foreach ($resume->resumeJson['wd'] as $id => $wdInfo): ?>
                    <div class="item">
                        <div class="meta">
                            <div class="upper-row">
                                <h3 class="job-title"><?= getConfigValue('JobType', $wdInfo['type']) ?></h3>
                                <div class="time"><?= $wdInfo['from'] ?>-<?= $wdInfo['end'] ?></div>
                            </div><!--//upper-row-->
                            <div class="company"><?= $wdInfo['company'] ?></div>
                        </div><!--//meta-->
                        <div class="details"><?= $wdInfo['desc'] ?></div>
                    </div><!--//item-->
                    <?php endforeach; ?>

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


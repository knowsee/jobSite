<?php $this->load->view('common/header'); ?>
<style>
    .about-baseInfo li {
        font-size: 15px;
    }
    .about-baseInfo li code {
        color: red;
    }
</style>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">My Center</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Job Alerts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="content">
    <div class="container">
        <div class="row">
            <?php $this->load->view('seeker/menu'); ?>
            <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="inner-box my-resume">
                    <div class="author-resume">
                        <div class="thumb">
                            <img src="<?= base_url('static/') ?>assets/img/resume/img-1.jpg" alt="">
                        </div>
                        <div class="author-info">
                            <h3>[<?= getConfigValue('jobAward', $resume->award) ?>]<?= $resume->realName ?></h3>
                            <p class="sub-title">[<?= getConfigValue('jobProfessor', $resume->jobProfessor) ?>]<?= getConfigValue('JobType', $resume->jobCategory) ?></p>
                            <p><span class="address"><i class="ti-location-pin"></i><?= getConfigValue('City', $resume->jobLocation) ?></span></p>
                            <div class="social-link" style="display:none;">  
                                <a class="twitter" target="_blank" data-original-title="twitter" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
                                <a class="facebook" target="_blank" data-original-title="facebook" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
                                <a class="google" target="_blank" data-original-title="google-plus" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-google"></i></a>
                                <a class="linkedin" target="_blank" data-original-title="linkedin" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>                  
                    </div>
                    <div class="about-me item">
                        <h3>My Base Infomation</h3>
                        <div class="about-baseInfo">
                            <li><code>Age</code> <?php echo round((time() - $resume->birthday) / (3600 * 24 * 365)) ?> years old</li>
                            <li><code>Email</code> <?= $resume->email ?></li>
                            <li><code>Phone</code> <?= $resume->phone ?></li>
                            <li><code>Wish salary</code> <?= getConfigValue('Csalary', $resume->salary) ?> /month</li>
                            <li><code>Job experience</code> <?= $resume->jobExperience ?> years</li>
                        </div>
                    </div>
                    <div class="work-experence item">
                        <h3>Work Experience</h3>
                        <?php foreach ($resume->resumeJson['wd'] as $id => $wdInfo): ?>
                            <h4><?= getConfigValue('JobType', $wdInfo['type']) ?></h4>
                            <h5><?= $wdInfo['company'] ?></h5>
                            <span class="date"><?= $wdInfo['from'] ?>-<?= $wdInfo['end'] ?></span>
                            <p><?= $wdInfo['desc'] ?></p>
                            <br>
                        <?php endforeach; ?>
                    </div>
                    <div class="education item">
                        <h3>Education </h3>
                        <?php foreach ($resume->resumeJson['edu'] as $id => $eduInfo): ?>
                            <h4><?= $eduInfo['school'] ?></h4>
                            <p>[<?= getConfigValue('jobAward', $eduInfo['award']) ?>]<?= $eduInfo['fieldname'] ?></p>
                            <span class="date"><?= $eduInfo['from'] ?>-<?= $eduInfo['end'] ?></span>
                            <br>
                        <?php endforeach; ?>
                    </div>
                    
                    
                    <div class="item clearfix">
                        <h3 class="section-title">Skill</h3>
                        <div class="col-md-12">
                            <?php $skillValue = [1 => '100', '70', '40'];?>
                            <?php foreach ($resume->skillJson as $skill): ?>
                            
                                <div>
                                    <label><?=$skill['name']?> ( <?= getConfigValue('perList', $skill['value']) ?> )</label>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="<?=$skillValue[$skill['value']]?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$skillValue[$skill['value']]?>%"></div>
                                    </div>
                                </div>
                            
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    
                    
                </div>



            </div>
        </div>
    </div>
</section>
<?php $this->load->view('common/footer'); ?>


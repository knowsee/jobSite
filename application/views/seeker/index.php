<?php $this->load->view('common/header'); ?>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">My Center</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Index</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->    


<section id="content">
    <div class="container">
        <div class="row">
            <?php $this->load->view('seeker/menu'); ?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="job-alerts-item">
                    <h3 class="alerts-title">Manage Resume</h3>
                    <div class="manager-resumes-item">
                        <?php if(!$resume->updateTime): ?>
                        <div class="manager-content">
                            <div class="manager-info">
                                <div class="manager-name">
                                    <h4>Please Edit You Resume</h4>
                                    <h5>N/A</h5>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="manager-content">
                            <div class="manager-info">
                                <div class="manager-name">
                                    <h4><a href="#"><?=$resume->realName?></a></h4>
                                    <h5><?= getConfigValue('JobType', $resume->jobCategory)?></h5>
                                </div>
                                <div class="manager-meta">
                                    <span class="location"><i class="ti-location-pin"></i> <?=getConfigValue('City', $resume->jobLocation)?></span>
                                    <span class="rate"><i class="ti-time"></i> <?=getConfigValue('JobType', $resume->jobCategory)?></span>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="update-date">
                            <p class="status">
                                <strong>Updated on:</strong> <?=$resume->updateTime ? mdate('%y-%m-%d', $resume->updateTime) : 'n/a'?>
                            </p>
                            <div class="action-btn">
                                <a class="btn btn-xs btn-default" href="#">Lock</a>
                                <a class="btn btn-xs btn-default" href="<?=site_url('Seeker/resume')?>">Edit</a>
                            </div>
                        </div>
                    </div>
                    <h3 class="alerts-title">Job Recommended</h3>
                    <?php foreach ($jobList as $job): ?>
                        <div class="job-list">
                            <div class="job-list-content">
                                <h3><a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $job['jobId'] ?>">[<?= getConfigValue('jobProfessor', $job['jobProfessor']) ?>]<?= $job['jobTitle'] ?></a></h3>
                                <p><?= $job['companyName'] ?>【<?= getConfigValue('Csize', $job['people']) ?> people】<span class="full-time">Full-Time</span> </p>
								
                                <div class="job-tag">
                                    <div class="pull-left">
                                        <div class="meta-tag">
                                            <span><a href="<?= site_url('index/search') ?>?jobtype=<?= $job['jobType'] ?>&simple=1"><i class="ti-brush"></i><?= getConfigValue('JobType', $job['jobType']) ?></a></span>
                                            <span><i class="ti-location-pin"></i><?= getConfigValue('City', $job['jobLocation']) ?></span>
                                            <span><i class="ti-time"></i><?= getConfigValue('Csalary', $job['salary']) ?>/Month</span>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $job['jobId'] ?>" class="btn btn-common btn-sm">More Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('common/footer'); ?>


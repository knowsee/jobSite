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
                        <li class="current">Job Recommended</li>
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
                <div class="job-alerts-item">
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


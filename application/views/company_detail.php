<?php $this->load->view('common/header'); ?>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">About <?= $company->title ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current"><?= $company->title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->    


<section class="about section">
    <div class="container">
        <div class="row">
            <div class="row">          
                <div class="col-md-5 col-sm-12">
                    <center><img src="<?= base_url('uploads/') ?><?= $company->logo ?>" alt="img"></center>      
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="about-content">
                        <h2 class="medium-title">About <?= $company->title ?></h2>
                        <div class="desc">
                            <?= $company->description ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h1 class="section-title text-center">
                    <?= $company->title ?> Detail
                </h1> 
                <div class="row">        
                    <div class="col-sm-6 col-md-3">
                        <div class="service-item">
                            <div class="icon-wrapper">
                                <i class="ti-user">
                                </i>
                            </div>
                            <h2>
                                Company Type && Size
                            </h2>
                            <p>
                                <?= getConfigValue('Ctype', $company->type) ?>[<?= getConfigValue('Csize', $company->people) ?> people]
                            </p>
                        </div>
                        <!-- Service-Block-1 Item Ends -->
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <!-- Service-Block-1 Item Starts -->
                        <div class="service-item">
                            <div class="icon-wrapper">
                                <i class="ti-location-pin">
                                </i>
                            </div>
                            <h2>
                                Company Location
                            </h2>
                            <p>
                                <?= getConfigValue('City', $company->location) ?>
                            </p>
                        </div>             
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="service-item">
                            <div class="icon-wrapper">
                                <i class="ti-home">
                                </i>
                            </div>
                            <h2>
                                Company Website
                            </h2>
                            <p>
                                <?= $company->website ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3" onclick="javascript:onLike('<?= $company->cid ?>');">
                        <div class="service-item">
                            <div class="icon-wrapper">
                                <i class="ti-thumb-up">
                                </i>
                            </div>
                            <h2>
                                Like < Click >
                            </h2>
                            <p id="company_like" class="counter">
                                <?= $company->userLike ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h2 class="medium-title">Job List</h2>
                <?php foreach ($jobList as $job): ?>
                    <div class="job-list">
                        <div class="job-list-content">
                            <h4><a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $job['jobId'] ?>">[<?= getConfigValue('jobProfessor', $job['jobProfessor']) ?>]<?= $job['jobTitle'] ?></a><span class="full-time">Full-Time</span></h4>
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
			<div class="col-md-12">
                <h2 class="medium-title">Judge List</h2>
                <?php foreach ($judgeList as $judge): ?>
                    <div class="job-list">
                        <div class="job-list-content">
                            <h4 style="font-size: 18px;">About <a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $judge['jobId'] ?>"><?= $judge['jobName'] ?></a> 【Interview at <strong><?= mdate('%y-%m-%d', $judge['applyInterviewTime']) ?></strong>】</h4>
                            <div class="job-tag">
                                <div class="pull-left">
								<p style="font-size: 16px;"><?= $judge['employeeMessage'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<script>
    function onLike(cid) {
        ajaxPost('<?= site_url('Index/like') ?>', {'cid': cid}, function (data, message, code) {
            if (code !== 200) {
                alertMsg(message, 'error');
            } else {
                alertMsg(message, 'success');
                $('#company_like').html(data.like);
                $('#company_like').counterUp({
                    time: 800
                });
            }
        });
    }
</script>
<?php $this->load->view('common/footer'); ?>


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
                        <li class="current">Job Invite</li>
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
                    <h3 class="alerts-title">Job Invite</h3>
                    <div class="alerts-list">
                        <div class="row">
                            <div class="col-md-3">
                                <p>Company/Job</p>
                            </div>
                            <div class="col-md-3">
                                <p>Location</p>
                            </div>
                            <div class="col-md-3">
                                <p>Salary</p>
                            </div>
                            <div class="col-md-3">
                                <p>Action</p>
                            </div>
                        </div>
                    </div>
                    <?php foreach($jobList as $job): ?>
                    <div class="alerts-content">
                        <div class="row">
                            <div class="col-md-3">
                                <h3><?=$job['companyName']?></h3>
                                <p><?=$job['jobTitle']?></p>
                            </div>
                            <div class="col-md-3">
                                <span class="location"><i class="ti-location-pin"></i> <?= getConfigValue('City', $job['jobLocation']) ?></span>
                            </div>
                            <div class="col-md-3">
                                <p><span class="full-time"><?= getConfigValue('Csalary', $job['salary']) ?></span></p>
                            </div>
                            <div class="col-md-3">
                                <p>
                                    <a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $job['jobId'] ?>" target="_blank" title="Open on new window">Detail</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <!-- Start Pagination -->
                    <br>
                    <ul class="pagination" style='display:none;'>              
                        <li class="active"><a href="#" class="btn btn-common"><i class="ti-angle-left"></i> prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li class="active"><a href="#" class="btn btn-common">Next <i class="ti-angle-right"></i></a></li>
                    </ul>
                    <!-- End Pagination -->
                </div>


            </div>









        </div>
    </div>
</section>


<?php $this->load->view('common/footer'); ?>


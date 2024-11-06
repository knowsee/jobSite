<?php $this->load->view('common/header'); ?>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Manager Jobs</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Manager Jobs</li>
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
            <?php $this->load->view('company/menu'); ?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="job-alerts-item candidates">
                    <h3 class="alerts-title">Manage Jobs</h3>
                    <div class="alerts-list">
                        <div class="row">
                            <div class="col-md-5">
                                <p>Name</p>
                            </div>
                            <div class="col-md-3">
                                <p>EndDate/Job Type</p>
                            </div>
                            <div class="col-md-2">
                                <p>Accepts/Views</p>
                            </div>
                            <div class="col-md-2">
                                <p>Action</p>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($list as $key => $job): ?>
                        <div class="alerts-content">
                            <div class="row">
                                <div class="col-md-5">
                                    <h3><a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $job['jobId'] ?>" target="_blank" title="Open on new window"><?= $job['jobTitle'] ?></a></h3>
                                    <span class="location"><i class="ti-location-pin"></i> <?= getConfigValue('City', $job['jobLocation']) ?></span>
                                    <p style="margin:0"><a href="<?= site_url('ManagerCompany/findresume') ?>?jobId=<?= $job['jobId'] ?>" class="btn btn-common btn-sm">Find Resume</a></p>
                                </div>
                                <div class="col-md-3">
                                    <p><span class="full-time"><?= mdate('%Y-%m-%d', $job['endDay']) ?></span></p>
                                    <p><span class="full-time">Full-Time</span></p>
                                </div>
                                <div class="col-md-2">
                                    <p><?= $job['apply'] ?>/<?= $job['view'] ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p style="margin:0"><a href="<?= site_url('ManagerCompany/editJob') ?>?jobId=<?= $job['jobId'] ?>" class="btn btn-common btn-sm">Edit</a></p>
                                    <p style="margin:0"><a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $job['jobId'] ?>" target="_blank" class="btn btn-common btn-sm" title="Open on new window">View</a></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- Start Pagination -->
                    <br>
                    <ul class="pagination" style="display:none;">              
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


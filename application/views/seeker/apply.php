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

                <div class="job-alerts-item">

                    <h3 class="alerts-title">Your applications</h3>
                    <?php foreach($applyList as $apply): ?>
                    <div class="applications-content">
                        <div class="row">
                            <div class="col-md-5">
                                <h3><?=$apply['jobName']?></h3>
                                <span><?=$apply['companyName']?></span>
                            </div>
                            <div class="col-md-3">
                                <p><span class="full-time">Full-Time</span></p>
                            </div>
                            <div class="col-md-2">
                                <p><?=mdate('%Y-%m-%d', $apply['applyTime'])?></p>
                            </div>                   
                            <div class="col-md-2">
                                <p style="color: black;"><?=$statusName[$apply['applyStatus']]?></p>
                            </div>
                        </div>
                        <?php if($apply['applyStatus'] == 2): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-info" style="color:#002166; margin: 0;">*Your apply is pass. Please come to interview on [<?=mdate('%y-%m-%d %h:%i', $apply['applyInterviewTime'])?>]<a href="<?= site_url('seeker/judge') ?>?appId=<?= $apply['appId'] ?>">[Judge this apply]</a></p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                    <!-- Start Pagination -->
                    <br>
                    <ul class="pagination" style="display: none;">              
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
</section>


<?php $this->load->view('common/footer'); ?>


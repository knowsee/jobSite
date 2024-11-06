<?php $this->load->view('common/header'); ?>
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Manager Jobs</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Post A Job</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="content">
    <div class="container">
        <div class="row">
            <?php $this->load->view('company/menu'); ?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="job-alerts-item candidates">
                    <h3 class="alerts-title">Post A Job</h3>
                    <?php $this->load->view('company/job_form'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('common/footer'); ?>


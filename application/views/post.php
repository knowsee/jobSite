<?php $this->load->view('common/header'); ?>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Post A Job</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Post A Job</li>
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
            <div class="col-sm-12 col-md-9 col-md-offset-2">
                <?php if (!$this->userInfo->userId): ?>
                <fieldset>
                    <label>Have an account?</label>
                    <div class="field account-sign-in">
                        <p>
                            <a class="btn btn-common btn-sm" href="<?= site_url('index/login') ?>"><i class="ti-key"></i> Sign in</a>
                        </p>                      
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                            If you don’t have an account you can create one below by entering your email address.     
                        </div>
                    </div>
                </fieldset>
                <?php endif; ?>
                <div class="page-ads box">
                    <?php $this->load->view('company/job_form'); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('common/footer'); ?>


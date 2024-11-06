<?php $this->load->view('common/header'); ?>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">My Information</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Information</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="content">
    <div class="container">
        <div class="row">
            <?php if ($userType == 'user'): ?>
                <?php $this->load->view('seeker/menu'); ?>
            <?php else: ?>
                <?php $this->load->view('company/menu'); ?>
            <?php endif; ?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="job-alerts-item notification">
                    <h3 class="alerts-title">My Information</h3>

                    <form action="<?= site_url('index/member')?>" method="post" class="form">
                        <div class="form-group is-empty">
                            <label class="control-label" for="textarea">Old Password*</label>
                            <input class="form-control" type="password" name="oldpass">
                            <span class="material-input">*Your old password</span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label" for="textarea">New Password*</label>
                            <input class="form-control" type="password" name="newpass">
                            <span class="material-input">*New password need have 8 length</span>
                        </div> 
                        <button type="submit" class="btn btn-common">Save Change</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('form').submit(function (e) {
        e.preventDefault();
        $this = $(this);
        ajaxPostForm($this);
    });
</script>
<?php $this->load->view('common/footer'); ?>


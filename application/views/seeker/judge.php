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
                        <li class="current">Judge this apply</li>
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

                <div class="page-ads box">
                    <?= form_open_multipart('Seeker/postJudge', array('class' => 'form-ad', 'name' => 'judge')) ?>
                    <input name="appId" value="<?= $applyInfo->appId ?>" type="hidden" />
                    <div class="form-group">
                        <label class="control-label">JobName</label>
                        <p><strong><?= $applyInfo->jobName ?></strong></p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Interview Date</label>
                        <p><strong><?= mdate('%y-%m-%d', $applyInfo->applyInterviewTime) ?></strong></p>
                    </div>
                    <div class="form-group">
						<label class="control-label">Judge Message</label>
						<input type="text" name="employeeMessage" class="form-control" value="<?= $applyInfo->employeeMessage ?>">
					</div>
                    <button type="submit" class="btn btn-common">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</section>

<script>
    $('form').submit(function (e) {
        e.preventDefault();
        $this = $(this);
        ajaxPostForm($this, function (data, message, code) {
            alertMsg(data.message, '', function () {
                location.reload();
            });
        });
    });
</script>
<?php $this->load->view('common/footer'); ?>


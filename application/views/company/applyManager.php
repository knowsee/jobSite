<?php $this->load->view('common/header'); ?>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Manage applications Detail</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Manage applications Detail</li>
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
                <div class="page-ads box">
                    <?= form_open_multipart('ManagerCompany/postApply', array('class' => 'form-ad', 'name' => 'manageApply')) ?>
                    <input name="appId" value="<?= $applyInfo->appId ?>" type="hidden" />
                    <input name="optionStatus" value="<?= $optionStatus ?>" type="hidden" />
                    <div class="form-group">
                        <label class="control-label">JobName</label>
                        <p><strong><?= $applyInfo->jobName ?></strong></p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Interview for</label>
                        <p><strong><?= $resumeInfo->realName ?></strong></p>
                    </div>
                    <?php if ($optionStatus == 5): ?>
                        <div class="form-group">
                            <label class="control-label">Interview Date</label>
                            <p><strong><?= mdate('%y-%m-%d', $applyInfo->applyInterviewTime) ?></strong></p>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Evaluate Message</label>
                            <input type="text" name="evaluateMessage" class="form-control" value="<?= $applyInfo->evaluateMessage ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Interview Ontime</label>
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select name="evaluateOntime" class="dropdown-product selectpicker">
                                        <option>Select Option</option>
                                        <option value="1" <?= $applyInfo->evaluateOntime == 1 ? 'selected' : '' ?>>Yes</option>
                                        <option value="2" <?= $applyInfo->evaluateOntime == 2 ? 'selected' : '' ?>>No</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="form-group">
                            <label class="control-label">Interview Date</label>
                            <input type="text" name="interviewdate" class="form-control" value="<?= mdate('%y-%m-%d', $applyInfo->applyInterviewTime) ?>">
                            <span class="material-input">*Date Time e.g 2018-01-23 07:07</span>
                        </div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-common">Submit</button>
                    </form>
                </div>
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
                window.location.href = data.uri;
            });
        });
    });
</script>
<?php $this->load->view('common/footer'); ?>


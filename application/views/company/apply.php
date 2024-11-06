<?php $this->load->view('common/header'); ?>
<style>
    .li-button {
        padding: 0 19px 0 5px;
    }
    .li-button li {
        width: 33%;
        float: right;
    }
    .li-button li .btn {
        width: 90%;
    }
</style>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Manage Applications</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Manage Applications</li>
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
                <div class="job-alerts-item">
                    <h3 class="alerts-title">Manage applications</h3>
                    <div class="alerts-list">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Apply For</p>
                            </div>
                            <div class="col-md-3">
                                <p>Apply Date</p>
                                <p style="color:#000">Interview Date</p>
                            </div>
                            <div class="col-md-3">
                                <p>Status</p>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($applyList as $apply): ?>
                        <div class="applications-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3><?= $apply['realName'] ?></h3>
                                    <span><?= $apply['jobName'] ?></span>
                                </div>
                                <div class="col-md-3">
                                    <p><?= mdate('%y-%m-%d', $apply['applyTime']) ?></p>
                                    <p style="color:#000"><?= $apply['applyInterviewTime'] ? mdate('%y-%m-%d', $apply['applyInterviewTime']) : 'none date' ?></p>
                                </div>                   
                                <div class="col-md-3">
                                    <p><p style="color: black;"><?= $statusName[$apply['applyStatus']] ?></p></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <?php if ($apply['applyStatus'] == 5): ?>
                                        <p><?= $apply['evaluateOntime'] == 1 ? '[Ontime]' : '[No coming]' ?>; <?= $apply['evaluateMessage'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-7 li-button" id="applybutton_<?= $apply['appId'] ?>">
                                    <ul>
                                        <li><a href="<?= site_url('ManagerCompany/resumeView') ?>?resumeId=<?= $apply['rid'] ?>&appId=<?= $apply['appId'] ?>" target="_blank" class="btn btn-common btn-sm">View Resume</a></li>
                                        <?php if ($apply['applyStatus'] < 2): ?>
                                            <li class="vhidden"><button data-bname="pass" data-id="<?= $apply['appId'] ?>" class="btn btn-common btn-sm">Pass</button></li>
                                            <li class="vhidden"><button data-bname="unpass" data-id="<?= $apply['appId'] ?>" class="btn btn-common btn-sm">Unpass</button></li>
                                        <?php elseif ($apply['applyStatus'] > 1 && $apply['evaluateOntime'] < 1): ?>
                                            <li class="tips"><button data-bname="evaluate" data-id="<?= $apply['appId'] ?>" class="btn btn-common btn-sm">Evaluate</button></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('button[data-bname="pass"]').click(function () {
            var id = $(this).data('id');
            window.open('<?= site_url('ManagerCompany/manageApply') ?>?optionStatus=2&appid=' + id);
        });
        $('button[data-bname="evaluate"]').click(function () {
            var id = $(this).data('id');
            window.open('<?= site_url('ManagerCompany/manageApply') ?>?optionStatus=5&appid=' + id);
        });
        $('button[data-bname="unpass"]').click(function () {
            var id = $(this).data('id');
            ajaxPost('<?= site_url('ManagerCompany/manageApply') ?>', {'appId': id, 'optionStatus': '3'}, function (data, message, code) {
                alertMsg(message, '', function () {
                    $('applybutton_' + id + ' .vhidden').hidden();
                });
            });
        });
    });
</script>
<?php $this->load->view('common/footer'); ?>
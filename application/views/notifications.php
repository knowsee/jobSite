<?php $this->load->view('common/header'); ?>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">My Notifications</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Notifications</li>
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
                    <h3 class="alerts-title">My Notifications</h3>
                    <?php if(empty($notificationList)): ?>
                    <div class="text-info" style="font-size: 18px; margin: 30px 0;">Sorry, You haven't any schedule</div>
                    <?php endif; ?>
                    <?php foreach ($notificationList as $notification): ?>
                        <div class="notification-item">
                            <div class="thums">
                                <img src="<?= base_url('static/') ?>assets/img/resume/img-1.jpg" alt="">
                            </div>
                            <div class="text-left">
                                <?php if ($userType == 'user'): ?>
                                    <p style="font-size: 16px;">Your Have a job interview on [<?= mdate('%y-%m-%d %h:%i', $notification['applyInterviewTime']) ?>].</p>
                                <?php else: ?>
                                    <p style="font-size: 16px;"><span style="font-size: 18px; font-weight: bold;"><?= $notification['realName'] ?></span> will interview job [<?= $notification['jobName'] ?>] on [<?= mdate('%y-%m-%d %h:%i', $notification['applyInterviewTime']) ?>].</p>
                                <?php endif; ?>
                                    
                                <span class="time"><i class="ti-time"></i>after <?php $timeArray = dayToNow($notification['applyInterviewTime']); echo $timeArray['time'].($timeArray['format'] == 'd' ? ' day' : ' hours'); ?></span>
                                <?php if ($userType == 'company'): ?>
                                [<a href="<?= site_url('ManagerCompany/resumeView') ?>?resumeId=<?= $notification['rid'] ?>&appId=<?= $notification['appId'] ?>" target="_blank" class="alerts-link">View Resume</a>]
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <p class="help-block">* View your schedule after 5 days</p>
                    <!-- Start Pagination -->
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('common/footer'); ?>


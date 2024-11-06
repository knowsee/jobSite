<?php $this->load->view('common/header'); ?>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Find Resume with Jobs</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Find Resume</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<div id="content">
    <div class="container">        
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
                <h2 class="alerts-title">Find Resume</h2>

                <div class="manager-resumes-item">
                    <div class="manager-content">
                        <div class="manager-info">
                            <div class="manager-name">
                                <h4>Job Name: <?= $jobInfo->jobTitle ?></h4>
                                <h5><?= getConfigValue('JobType', $jobInfo->jobType) ?></h5>
                            </div>
                            <div class="manager-meta">
                                <span class="location"><i class="ti-location-pin"></i> <?= getConfigValue('City', $jobInfo->jobLocation) ?></span>
                                <span class="rate"><i class="ti-time"></i> <?= getConfigValue('Csalary', $jobInfo->salary) ?>/Month</span>
                            </div>
                        </div>                    
                    </div>
                    <div class="item-body">
                        <div>
                            <?= $jobInfo->jobDescription ?>
                        </div>
                        <div class="tag-list">
                            <?php foreach (explode(',', $jobInfo->jobTags) as $tags): ?>
                                <span><?= $tags ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>   
            </div>
            <?php if (empty($reCommend)): ?>
                <div class="text-info" style="font-size: 18px; margin: 30px 0;">Sorry, Our database doesn't found suited resume</div>
            <?php endif; ?>
            <?php foreach ($reCommend as $resume): ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="manager-resumes-item">
                        <div class="manager-content">
                            <a href="<?= site_url('ManagerCompany/resumeView') ?>?resumeId=<?= $resume['rid'] ?>" target="_blank"><img class="resume-thumb" src="<?= base_url('static/') ?>assets/img/jobs/avatar-1.jpg" alt=""></a>
                            <div class="manager-info">
                                <div class="manager-name">
                                    <h4><a href="<?= site_url('ManagerCompany/resumeView') ?>?resumeId=<?= $resume['rid'] ?>" target="_blank"><?= $resume['realName'] ?></a></h4>
                                </div>
                                <div class="manager-meta">
                                    <span class="location"><i class="ti-location-pin"></i> <?= getConfigValue('City', $resume['jobLocation']) ?></span>
                                    <span class="rate"><i class="ti-time"></i> <?= getConfigValue('Csalary', $resume['salary']) ?> /month</span>
                                </div>
                            </div>                    
                        </div>
                        <div class="item-body">
                            <p>I am <?php echo round((time() - $resume->birthday) / (3600 * 24 * 365)) ?> years old, have <?= $resume['jobExperience'] ?> years work experience, this is my phone number <?= $resume['phone'] ?></p>
                            <div class="tag-list">
                                <?php $skllJson = json_decode($resume['skillJson'], true);
                                $skillValue = [1 => '100', '70', '']; ?>
                                <?php foreach ($skllJson as $tag): ?>
                                    <span><?= $tag['name'] ?>(<?= getConfigValue('perList', $tag['value']) ?>)</span>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-md-12 li-button">
                                <ul>
                                     <li><button data-bname="send" data-id="<?= $resume['rid'] ?>" class="btn btn-common btn-sm">Send Invite</button></li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                </div>
                <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('button[data-bname="send"]').click(function () {
            var rid = $(this).data('id');
            ajaxPost('<?= site_url('ManagerCompany/sendRecommend') ?>', {'rid': rid, 'jobId': '<?= $jobInfo->jobId ?>'}, function (data, message, code) {
                alertMsg(message);
            });
        });
    });
</script>
<?php $this->load->view('common/footer'); ?>


<?php $this->load->view('common/header'); ?>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Job Details</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Job Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->    


<section class="job-detail section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="content-area">
                    <h2 class="medium-title">Job Information</h2>
                    <div class="box">
                        <div class="text-left">
                            <h3>[<?= getConfigValue('jobProfessor', $job->jobProfessor) ?>]<?= $job->jobTitle ?></h3>
                            <p>Award： <?= getConfigValue('jobAward', $job->jobAward) ?>； Experience：<?= $job->experience ?> years</p>
                            <div class="meta">
                                <span><i class="ti-location-pin"></i> <?= getConfigValue('City', $job->jobLocation) ?></span>
                                <span><i class="ti-calendar"></i> <?= $job->createtime ?> - <?= mdate('%y-%m-%d', $job->endDay) ?></span>
                            </div>
                            <strong class="price"><i class="fa fa-money"></i><?= getConfigValue('Csalary', $job->salary) ?>/month</strong>
                            <a href="#" class="btn btn-info btn-sm">Full-Time</a>
                            <a href="javascript:onApply('<?= $job->jobId ?>');" class="btn btn-common btn-sm">Apply For This Job</a>
                        </div>                
                        <div class="clearfix">
                            <h4>Description</h4>
                            <div>
                                <?= $job->jobDescription ?>
                            </div>
                            <h4>Keyword</h4>
                            <div>
                                <?php foreach(explode(',', $job->jobTags) as $tag): ?>
								<?php $html[] = '<code><a href="'.site_url('Index/search').'?searchTitle='.$tag.'">'.$tag.'</a></code>'; ?>
								<?php endforeach; ?>
								<?=implode(',', $html); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <aside>
                    <div class="sidebar">
                        <h2 class="medium-title">Company Details</h2>
                        <div class="box">
                            <div class="thumb">
                                <img src="<?= base_url('uploads/') ?><?= $company->logo ?>" alt="img">
                            </div>
                            <div class="text-box">
                                <h4><a href="<?= site_url('Index/companyDetail')?>?cid=<?=$company->cid?>"><?= $company->title ?></a><?=$company->identification == 0 ? '' : '[verify]'?><em>(View All Jobs)</em></h4>
                                <p>
                                    <?= subtext(strip_tags($company->description)) ?>
                                </p>
                                <strong>Location</strong>
                                <p><?= getConfigValue('City', $company->location) ?><?= $company->address ?></p>
                                <strong>Website</strong>
                                <p><?= $company->website ?></p>
                            </div>
                        </div>
                        <h2 class="medium-title">Hot Jobs</h2>
                        <?php foreach ($cJobs as $hJob): ?>
                            <div class="box">
                                <div class="text-box"> 
                                    <h4><a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $hJob['jobId'] ?>">[<?= getConfigValue('jobProfessor', $hJob['jobProfessor']) ?>]<?= $hJob['jobTitle'] ?></a></h4>
                                    <a href="#" class="text"><i class="fa fa-map-marker"></i><?= getConfigValue('City', $hJob['jobLocation']) ?></a>
                                    <a href="#" class="text"><i class="fa fa-users"></i><?= getConfigValue('JobType', $hJob['jobType']) ?> </a>
                                    <strong class="price"><i class="fa fa-money"></i><?= getConfigValue('Csalary', $hJob['salary']) ?>/month</strong> 
                                    <a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $hJob['jobId'] ?>" class="btn btn-common btn-sm">Apply for this Job</a> 
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<script>
    function onApply(jobId) {
        ajaxPost('<?= site_url('Index/applyJob') ?>', {'jobId': jobId}, function (data, message, code) {
            if (code !== 200) {
                alertMsg(message, 'error');
            } else {
                alertMsg(message);
            }
        });
    }
</script>
<?php $this->load->view('common/footer'); ?>


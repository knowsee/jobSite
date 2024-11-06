<?php $this->load->view('common/header'); ?>
<style>
    .search-category-container {
        border: 1px #E5E5E5 solid;
        margin-bottom: 10px !important;
    }
    .search-container .form-control {
        border: 1px #E5E5E5 solid;
    }
</style>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Find Job</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Find Job</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->    


<div class="search-container" style="padding: 15px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <?php echo form_open('index/search'); ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <input class="form-control" type="text" value="<?= $searchValue['searchTitle'] ?>" name="searchTitle" placeholder="job title / keywords / company name">
                                <i class="ti-time"></i>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select name="salary" class="dropdown-product selectpicker">
                                        <option value="-1">Wish salary</option>
                                        <option value="0">All salary</option>
                                        <?php foreach ($this->config->item('Csalary') as $id => $name): ?>
                                            <option value="<?= $id ?>" <?= $searchValue['salary'] == $id ? 'selected' : '' ?>><?= $name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select name="location" class="dropdown-product selectpicker">
                                        <option value="-1">Job where</option>
                                        <option value="0">All Place</option>
                                        <?php foreach ($this->config->item('City') as $id => $name): ?>
                                            <option value="<?= $id ?>" <?= $searchValue['location'] == $id ? 'selected' : '' ?>><?= $name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select name="jobaward" class="dropdown-product selectpicker">
                                        <option value="-1">Select Award</option>
                                        <option value="0">All Award</option>
                                        <?php foreach ($this->config->item('jobAward') as $id => $name): ?>
                                            <option value="<?= $id ?>" <?= $searchValue['jobaward'] == $id ? 'selected' : '' ?>><?= $name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select name="jobtype" class="dropdown-product selectpicker">
                                        <option value="0">All Categories</option>
                                        <?php foreach ($this->config->item('JobType') as $id => $name): ?>
                                            <option value="<?= $id ?>" <?= $searchValue['jobtype'] == $id ? 'selected' : '' ?>><?= $name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-6">
                            <button type="submit" class="btn btn-search-icon"><i class="ti-search"></i></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="find-job section">
    <div class="container">
        <h2 class="section-title">Find good a Job</h2>
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($searchList as $Job): ?>
                    <div class="job-list">
						<div class="thumb">
						<?php if($Job['logo']): ?>
							<a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $Job['jobId'] ?>"><img class="img-thumbnail" width="150" src="<?= base_url('uploads/') ?><?= $Job['logo'] ?>" alt=""></a>
						<?php endif; ?>
					    </div>
                        <div class="job-list-content">
                            <h4><a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $Job['jobId'] ?>">[<?= getConfigValue('jobProfessor', $Job['jobProfessor']) ?>]<?= $Job['jobTitle'] ?></a></h4>
                            <p><a href="<?= site_url('Index/companyDetail') ?>?cid=<?= $Job['companyId'] ?>"><?= $Job['companyName'] ?></a>【<?= getConfigValue('Csize', $Job['people']) ?> people】</p>
                            <div class="job-tag">
                                <div class="pull-left">
                                    <div class="meta-tag">
                                        <span><a href="#"><i class="ti-brush"></i><?= getConfigValue('JobType', $Job['jobType']) ?></a></span>
                                        <span><i class="ti-location-pin"></i><?= getConfigValue('City', $Job['jobLocation']) ?></span>
                                        <span><i class="ti-time"></i><?= getConfigValue('Csalary', $Job['salary']) ?>/month</span>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <div class="btn btn-common btn-sm"><a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $Job['jobId'] ?>" style="color:#FFF">More Detail</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-12">
                <div class="showing pull-left">
                    Find <?= $jobNum ?> Jobs</a>
                </div>                    
                <ul class="pagination pull-right" style="display:none;">              
                    <li class="active"><a href="#" class="btn btn-common" ><i class="ti-angle-left"></i> prev</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('common/footer'); ?>


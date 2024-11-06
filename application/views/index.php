<?php $this->load->view('common/header'); ?>

<style>
.typeahead,
.tt-query,
.tt-hint {
	width: 335px;
}

.typeahead {
  background-color: #fff;
}

.typeahead:focus {
  border: 2px solid #0097cf;
}

.tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-menu {
  width: 335px;
  margin: 0px 0;
  padding: 8px 0;
  background-color: #fff;
  z-index: 9999!important;
  color: #000;
  border: 2px solid #0097cf;
  border-top: none;
}

.tt-suggestion {
  padding: 3px 20px;
  font-size: 18px;
  line-height: 24px;
}

.tt-suggestion:hover {
  cursor: pointer;
  color: #fff;
  background-color: #0097cf;
}

.tt-suggestion.tt-cursor {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
}
</style>
<section id="intro-bg">
    <div class="search-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <?php echo form_open('index/search'); ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control typeahead" type="text" name="searchTitle" placeholder="job title / keywords / company name">
                                    <i class="ti-time"></i>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="search-category-container">
                                    <label class="styled-select">
                                        <select name="salary" class="dropdown-product selectpicker">
                                            <option value="-1">Wish salary</option>
                                            <option value="0">All salary</option>
                                            <?php foreach ($this->config->item('Csalary') as $id => $name): ?>
                                                <option value="<?= $id ?>"><?= $name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="search-category-container">
                                    <label class="styled-select">
                                        <select name="location" class="dropdown-product selectpicker">
                                            <option value="-1">Job where</option>
                                            <option value="0">All Place</option>
                                            <?php foreach ($this->config->item('City') as $id => $name): ?>
                                                <option value="<?= $id ?>"><?= $name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="search-category-container">
                                    <label class="styled-select">
                                        <select name="jobtype" class="dropdown-product selectpicker">
                                            <option value="0">All Categories</option>
                                            <?php foreach ($this->config->item('JobType') as $id => $name): ?>
                                                <option value="<?= $id ?>"><?= $name ?></option>
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
                    <div class="popular-jobs" style="display:none">
                        <a href="#">Junior PHP Engineer</a>
                        <a href="#">Senior Java Engineer</a>
                        <a href="#">Senior Python Engineer</a>
                        <a href="#">Senior Backend Engineer</a>
                    </div>
                    <div class="popular-jobs" style="clear:both; padding: 15px 0; display:none">
                        <b>*Guess you want found. Another batch?</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end intro section -->

<!-- Find Job Section Start -->
<section class="find-job section">
    <div class="container">
        <h2 class="section-title">Hot Jobs</h2>
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($hotlist as $hJob): ?>
                    <div class="job-list">
						<div class="thumb">
						<?php if($hJob['logo']): ?>
							<a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $hJob['jobId'] ?>"><img class="img-thumbnail" width="150" src="<?= base_url('uploads/') ?><?= $hJob['logo'] ?>" alt=""></a>
						<?php endif; ?>
					    </div>
                        <div class="job-list-content">
                            <h4><a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $hJob['jobId'] ?>">[<?= getConfigValue('jobProfessor', $hJob['jobProfessor']) ?>]<?= $hJob['jobTitle'] ?></a></h4>
                            <p><a href="<?= site_url('Index/companyDetail') ?>?cid=<?= $hJob['companyId'] ?>"><?= $hJob['companyName'] ?></a>【<?= getConfigValue('Csize', $hJob['people']) ?> people】 </p>
                            <div class="job-tag">
                                <div class="pull-left">
                                    <div class="meta-tag">
                                        <span><a href="<?= site_url('index/search') ?>?jobtype=<?= $hJob['jobType'] ?>&simple=1"><i class="ti-brush"></i><?= getConfigValue('JobType', $hJob['jobType']) ?></a></span>
                                        <span><i class="ti-location-pin"></i><?= getConfigValue('City', $hJob['jobLocation']) ?></span>
                                        <span><i class="ti-time"></i><?= getConfigValue('Csalary', $hJob['salary']) ?>/Month</span>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $hJob['jobId'] ?>" class="btn btn-common btn-sm">More Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- Find Job Section End -->

<!-- Category Section Start -->
<section class="category section" >
    <div class="container">
        <h2 class="section-title">Browse Categories</h2>  
        <div class="row">   
            <div class="col-md-12">
                <?php foreach ($catetory as $id => $cate): ?>
                    <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                        <a title="search <?= $cate['cateName'] ?> jobs" href="<?= site_url('index/search') ?>?jobtype=<?= $cate['cid'] ?>&simple=1">
                            <div class="icon">
                                <i class="ti-<?= $cate['cateIcon'] ?>"></i>
                            </div>
                            <h3><?= $cate['cateName'] ?></h3>
                            <p><?= $cate['jobNum'] ?> jobs</p>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div> 
        </div>
    </div>
</section>
<!-- Category Section End -->  

<!-- Featured Jobs Section Start -->
<section class="featured-jobs section">
    <div class="container">
        <h2 class="section-title">
            New Jobs
        </h2>
        <div class="row">
            <?php foreach ($newlist as $nJob): ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="featured-wrap">
                            <div class="featured-inner">
                                <div class="item-body">
                                    <h3 class="job-title"><a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $nJob['jobId'] ?>">[<?= getConfigValue('jobProfessor', $nJob['jobProfessor']) ?>]<?= $nJob['jobTitle'] ?></a></h3>
                                    <div class="adderess"><i class="ti-location-pin"></i> <?= getConfigValue('City', $nJob['jobLocation']) ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot">
                            <span><i class="ti-calendar"></i> <?= $nJob['createtime'] ?></span>
                            <div class="view-iocn">
                                <a href="<?= site_url('index/jobdetail') ?>?jobId=<?= $nJob['jobId'] ?>"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-12">
            <ul class="pagination pull-right">              
                <li class="active"><button class="btn btn-common" ><a class="write" href="<?= site_url('Index/search') ?>">We have more jobs online [view all]</a></button></li>
            </ul>
        </div>
    </div>
</section>
<!-- Featured Jobs Section End -->


<!-- Counter Section Start -->
<section id="counter">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="counting">
                    <div class="icon">
                        <i class="ti-briefcase"></i>
                    </div>
                    <div class="desc">                
                        <h2>Jobs</h2>
                        <h1 class="counter"><?= $total['job'] ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="counting">
                    <div class="icon">
                        <i class="ti-user"></i>
                    </div>
                    <div class="desc">
                        <h2>Members</h2>
                        <h1 class="counter"><?= $total['user'] ?></h1>                
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="counting">
                    <div class="icon">
                        <i class="ti-write"></i>
                    </div>
                    <div class="desc">
                        <h2>Resume</h2>
                        <h1 class="counter"><?= $total['resume'] ?></h1>                
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="counting">
                    <div class="icon">
                        <i class="ti-heart"></i>
                    </div>
                    <div class="desc">
                        <h2>Company</h2>
                        <h1 class="counter"><?= $total['company'] ?></h1>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Counter Section End -->



<?php $this->load->view('common/footer'); ?>


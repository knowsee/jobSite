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


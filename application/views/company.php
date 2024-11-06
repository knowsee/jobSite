<?php $this->load->view('common/header'); ?>
<!-- Page Header Start -->
      <div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
        <div class="container">
          <div class="row">         
            <div class="col-md-12">
              <div class="breadcrumb-wrapper">
                <h2 class="product-title">Company</h2>
                <ol class="breadcrumb">
                  <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                  <li class="current">Edit Company</li>
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
		
		
		
		  <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="right-sideabr">
                <div class="inner-box">
                  <h4>Manage Job</h4>
                  <ul class="lest item">
					<li><a href="manage-applications.html">Manage Company</a></li>    
                    <li><a class="active" href="job-alerts.html">Manage Jobs</a></li>
                    <li><a href="manage-applications.html">Manage Applications</a></li>                    
                  </ul>
                  <ul class="lest">
                    <li><a href="change-password.html">Change Password</a></li>
                  </ul>
                </div>
              </div>
            </div>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="page-ads box">
              <form class="form-ad">
                <div class="form-group">
                  <label class="control-label">Company Title</label>
                  <input type="text" class="form-control">
                </div>
				<div class="form-group">
                  <label class="control-label">Company Location</label>
					<div class="search-category-container">
					  <label class="styled-select">
						<select class="dropdown-product selectpicker">
						  <option>Location where</option>
						  <?php foreach($this->config->item('City') as $id => $name): ?>
						  <option value="<?=$id?>"><?=$name?></option>
						  <?php endforeach; ?>
						</select>
					  </label>
					</div>
				</div>
				<div class="form-group">
                  <label class="control-label">Company Address</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label class="control-label">Industry</label>
                  <div class="search-category-container">
                    <label class="styled-select">
                      <select class="dropdown-product selectpicker">
                        <option>Choose Industry</option>
                        <?php foreach($this->config->item('Ctype') as $id => $name): ?>
					    <option value="<?=$id?>"><?=$name?></option>
					    <?php endforeach; ?>
                      </select>
                    </label>
                  </div>
                </div>
				<div class="form-group">
                  <label class="control-label">Company Size</label>
                  <div class="search-category-container">
                    <label class="styled-select">
                      <select class="dropdown-product selectpicker">
                        <option>Choose Size (people)</option>
						<?php foreach($this->config->item('Csize') as $id => $name): ?>
					    <option value="<?=$id?>"><?=$name?></option>
					    <?php endforeach; ?>
                      </select>
                    </label>
                  </div>
                </div> 
                <div class="form-group">
                  <label class="control-label">Description</label>                                    
                </div> 
                <section id="editor">
                  <div id='edit' style="margin-bottom: 30px;">
                    <h3>Description</h3>
                  </div>
                </section>
                <div class="form-group">
                  <label class="control-label">Website <span>(optional)</span></label>
                  <input type="text" class="form-control" placeholder="Website URL">
                </div>
                <a href="#" class="btn btn-common">Edit Submit</a>
              </form>
            </div>
          </div>
		  
		  
		  
		  
		  
		  
		  
		  
		  
        </div>
      </div>
    </section>
	
	
<?php $this->load->view('common/footer'); ?>


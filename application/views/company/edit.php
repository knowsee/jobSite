<?php $this->load->view('common/header'); ?>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Company Information</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Edit Company Information</li>
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
                    <div class="divider clearfix"><h3>Company information</h3> <a href="<?= site_url('Index/companyDetail') ?>?cid=<?=$this->userInfo->companyId?>" target="_blank" class="btn btn-common btn-sm pull-right">Preview Detail Page</a></div>
                    <?= form_open_multipart('ManagerCompany/edit', array('class' => 'form-ad', 'name' => 'companyEdit')) ?>
                    <div class="form-group">
                        <label class="control-label">Company Title</label>
                        <input type="text" class="form-control" name="title" value="<?= $companyInfo->title ?>">
                    </div>
                    <div class="form-group">
                        <div class="button-group">
                            <div class="action-buttons">
                                <div class="upload-button">
                                    <button class="btn btn-common">Company Logo</button>
                                    <input name="companyLogo" type="file">
                                    <?php if ($companyInfo->logo): ?>
                                        <img src="<?= base_url() . 'uploads/' . $companyInfo->logo ?>" width="100" />
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="button-group">
                            <div class="action-buttons">
                                <div class="upload-button">
                                    <button class="btn btn-common">Business Registration</button>
                                    <input name="identificationImg" type="file">
                                    <?php if ($companyInfo->identificationImg): ?>
                                        <img src="<?= base_url() . 'uploads/' . $companyInfo->identificationImg ?>" width="100" />
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Location</label>
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select name="location" class="dropdown-product selectpicker">
                                    <option>Location where</option>
                                    <?php foreach ($this->config->item('City') as $id => $name): ?>
                                        <option value="<?= $id ?>" <?= $companyInfo->location == $id ? 'selected' : '' ?>><?= $name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Address</label>
                        <input type="text" name="address" class="form-control" value="<?= $companyInfo->address ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Industry</label>
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select name="type" class="dropdown-product selectpicker">
                                    <option>Choose Industry</option>
                                    <?php foreach ($this->config->item('Ctype') as $id => $name): ?>
                                        <option value="<?= $id ?>" <?= $companyInfo->type == $id ? 'selected' : '' ?>><?= $name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Size</label>
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select name="people" class="dropdown-product selectpicker">
                                    <option>Choose Size (people)</option>
                                    <?php foreach ($this->config->item('Csize') as $id => $name): ?>
                                        <option value="<?= $id ?>" <?= $companyInfo->people == $id ? 'selected' : '' ?>><?= $name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label">Description</label>                                    
                    </div> 
                    <section>
                        <textarea name="description" style="margin-bottom: 30px;">
                            <?= $companyInfo->description ?>
                        </textarea>
                    </section>
                    <div class="form-group">
                        <label class="control-label">Website <span>(optional)</span></label>
                        <input name="website" type="text" class="form-control" value="<?= $companyInfo->website ?>" placeholder="Website URL">
                    </div>
                    <button type="submit" class="btn btn-common">Edit Submit</button>
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


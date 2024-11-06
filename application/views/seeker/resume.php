<?php $this->load->view('common/header'); ?>
<!-- Page Header Start -->
<div class="page-header" style="background: url(<?= base_url('static/') ?>assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">My Center</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>"><i class="ti-home"></i> Home</a></li>
                        <li class="current">Job Alerts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="content">
    <div class="container">
        <div class="row">
            <?php $this->load->view('seeker/menu'); ?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="job-alerts-item">
                    <div class="divider clearfix"><h3>Basic information</h3> <a href="<?= site_url('Seeker/resumeView') ?>" class="btn btn-common btn-sm pull-right">View Your Resume</a> <a href="<?= site_url('Seeker/downResume') ?>" class="btn btn-common btn-sm pull-right">Down Resume Pdf</a></div>
                    <?= form_open_multipart('Seeker/resume', array('class' => 'form-ad', 'name' => 'editresume')) ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="textarea">RealName</label>
                                <input type="text" class="form-control" placeholder="RealName" name="realName" value="<?= $resume->realName ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="text" class="form-control" placeholder="Your@domain.com" name="email" value="<?= $resume->email ? $resume->email : $this->userInfo->userEmail ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Phone</label>
                                <input type="text" class="form-control" placeholder="85297777777" name="phone" value="<?= $resume->phone ?>">
                                <span class="material-input">*Mobile or Phone eg. 85297777777</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Birthday</label>
                                <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="birthday" value="<?= $resume->birthday ? mdate('%Y-%m-%d', $resume->birthday) : date('Y-m-d', time() - 3600 * 24 * 365 * 23) ?>">
                                <span class="material-input">*Year e.g 2018.07.07 OR 2018-07-07</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Award</label>
                                <div class="search-category-container">
                                    <label class="styled-select">
                                        <select name="award" class="dropdown-product selectpicker">
                                            <option>Select Award</option>
                                            <?php foreach ($this->config->item('jobAward') as $id => $name): ?>
                                                <option value="<?= $id ?>" <?= $resume->award == $id ? 'selected' : '' ?>><?= $name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Job Location</label>
                                <div class="search-category-container">
                                    <label class="styled-select">
                                        <select name="jobLocation" class="dropdown-product selectpicker">
                                            <option>Job where</option>
                                            <?php foreach ($this->config->item('City') as $id => $name): ?>
                                                <option value="<?= $id ?>" <?= $resume->jobLocation == $id ? 'selected' : '' ?>><?= $name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Job Category</label>
                                <div class="search-category-container">
                                    <label class="styled-select">
                                        <select name="jobCategory" class="dropdown-product selectpicker">
                                            <option>All Categories</option>
                                            <?php foreach ($this->config->item('JobType') as $id => $name): ?>
                                                <option value="<?= $id ?>" <?= $resume->jobCategory == $id ? 'selected' : '' ?>><?= $name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Expected Salary</label>
                                <div class="search-category-container">
                                    <label class="styled-select">
                                        <select name="salary" class="dropdown-product selectpicker">
                                            <option>Choose Expected Salary</option>
                                            <?php foreach ($this->config->item('Csalary') as $id => $name): ?>
                                                <option value="<?= $id ?>" <?= $resume->salary == $id ? 'selected' : '' ?>><?= $name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Job Title</label>
                                <div class="search-category-container">
                                    <label class="styled-select">
                                        <select name="jobProfessor" class="dropdown-product selectpicker">
                                            <option>Choose Job Title</option>
                                            <?php foreach ($this->config->item('jobProfessor') as $id => $name): ?>
                                                <option value="<?= $id ?>" <?= $resume->jobProfessor == $id ? 'selected' : '' ?>><?= $name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="divider"><h3>Education</h3></div>
                    <div id="Education">
                        <?php if (!$resume->resumeJson['edu']): ?>
                            <div class="eduDiv" id="edu_1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Award</label>
                                            <div class="search-category-container">
                                                <label class="styled-select">
                                                    <select name="edu[1][Award]" class="dropdown-product selectpicker">
                                                        <option>Select Award</option>
                                                        <?php foreach ($this->config->item('jobAward') as $id => $name): ?>
                                                            <option value="<?= $id ?>" <?= $eduInfo['award'] == $id ? 'selected' : '' ?>><?= $name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="textarea">Field of Study</label>
                                            <input type="text" class="form-control"  placeholder="Major, e.g Computer Science" name="edu[1][FieldName]" value="<?= $eduInfo['fieldname'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="textarea">School</label>
                                    <input type="text" class="form-control" placeholder="School name, e.g. Massachusetts Institute of Technology" name="edu[1][School]" value="<?= $eduInfo['school'] ?>">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label" for="textarea">From</label>
                                            <input type="text" class="form-control"  placeholder="e.g 2014" name="edu[1][From]" value="<?= $eduInfo['from'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="textarea">To</label>
                                            <input type="text" class="form-control"  placeholder="e.g 2018" name="edu[1][End]" value="<?= $eduInfo['end'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="add-post-btn">
                                    <div class="pull-right">
                                        <a href="javascript:;" onclick="javascript:deleteEdu(this)" class="btn-delete"><i class="ti-trash"></i> Delete This</a>
                                    </div>
                                </div>
                                <hr>
                            </div>

                        <?php endif; ?>
                        <?php foreach ($resume->resumeJson['edu'] as $eduid => $eduInfo): ?>
                            <div class="eduDiv" id="edu_<?= $eduid ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Award</label>
                                            <div class="search-category-container">
                                                <label class="styled-select">
                                                    <select name="edu[<?= $eduid ?>][Award]" class="dropdown-product selectpicker">
                                                        <option>Select Award</option>
                                                        <?php foreach ($this->config->item('jobAward') as $id => $name): ?>
                                                            <option value="<?= $id ?>" <?= $eduInfo['award'] == $id ? 'selected' : '' ?>><?= $name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="textarea">Field of Study</label>
                                            <input type="text" class="form-control"  placeholder="Major, e.g Computer Science" name="edu[<?= $eduid ?>][FieldName]" value="<?= $eduInfo['fieldname'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="textarea">School</label>
                                    <input type="text" class="form-control" placeholder="School name, e.g. Massachusetts Institute of Technology" name="edu[<?= $eduid ?>][School]" value="<?= $eduInfo['school'] ?>">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label" for="textarea">From</label>
                                            <input type="text" class="form-control"  placeholder="e.g 2014" name="edu[<?= $eduid ?>][From]" value="<?= $eduInfo['from'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="textarea">To</label>
                                            <input type="text" class="form-control"  placeholder="e.g 2018" name="edu[<?= $eduid ?>][End]" value="<?= $eduInfo['end'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="add-post-btn">
                                    <div class="pull-right">
                                        <a href="javascript:;" onclick="javascript:deleteEdu(this)" class="btn-delete"><i class="ti-trash"></i> Delete This</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="add-post-btn">
                        <div class="pull-left">
                            <a href="javascript:add('edu')" class="btn-added"><i class="ti-plus"></i> Add New Education</a>
                        </div>
                    </div>
                    <div class="divider"><h3>Work Experience</h3></div>

                    <div id="Work">
                        <?php if (!$resume->resumeJson['wd']): ?>
                            <div class="wdDiv" id="wd_1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Job Category</label>
                                            <div class="search-category-container">
                                                <label class="styled-select">
                                                    <select name="wd[1][jobType]" class="dropdown-product selectpicker">
                                                        <option>All Categories</option>
                                                        <?php foreach ($this->config->item('JobType') as $id => $name): ?>
                                                            <option value="<?= $id ?>" <?= $wdInfo->type == $id ? 'selected' : '' ?>><?= $name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="textarea">Company Name</label>
                                            <input type="text" class="form-control"  placeholder="Company name" name="wd[1][Name]" value="<?= $wdInfo['company'] ?>">
                                        </div> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label" for="textarea">Joined Duration Form</label>
                                            <input type="number" class="form-control"  placeholder="e.g 2014" name="wd[1][From]" value="<?= $wdInfo['from'] ?>">
                                            <span class="material-input">*Year e.g 2014</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="textarea">Joined Duration To</label>
                                            <input type="number" class="form-control"  placeholder="e.g 2018" name="wd[1][End]" value="<?= $wdInfo['end'] ?>">
                                            <span class="material-input">*Year e.g 2018</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Experience Description</label>
                                </div>
                                <section id="editor" class="clearfix">
                                    <textarea name="wd[1][Description]" style="margin-bottom: 30px;">
                                        <?= $wdInfo['desc'] ?>
                                    </textarea>
                                </section>

                                <div class="add-post-btn" style="margin: 10px 0;">
                                    <div class="pull-right">
                                        <a href="javascript:;" onclick="javascript:deleteWd(this)" class="btn-delete"><i class="ti-trash"></i> Delete This</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        <?php endif; ?>
                        <?php foreach ($resume->resumeJson['wd'] as $wdid => $wdInfo): ?>
                            <div class="wdDiv" id="wd_<?= $id ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Job Category</label>
                                            <div class="search-category-container">
                                                <label class="styled-select">
                                                    <select name="wd[<?= $wdid ?>][jobType]" class="dropdown-product selectpicker">
                                                        <option>All Categories</option>
                                                        <?php foreach ($this->config->item('JobType') as $id => $name): ?>
                                                            <option value="<?= $id ?>" <?= $wdInfo->type == $id ? 'selected' : '' ?>><?= $name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="textarea">Company Name</label>
                                            <input type="text" class="form-control"  placeholder="Company name" name="wd[<?= $wdid ?>][Name]" value="<?= $wdInfo['company'] ?>">
                                        </div> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label" for="textarea">Date Form</label>
                                            <input type="number" class="form-control"  placeholder="e.g 2014" name="wd[<?= $wdid ?>][From]" value="<?= $wdInfo['from'] ?>">
                                            <span class="material-input">*Year e.g 2014</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="textarea">Date To</label>
                                            <input type="number" class="form-control"  placeholder="e.g 2018" name="wd[<?= $wdid ?>][End]" value="<?= $wdInfo['end'] ?>">
                                            <span class="material-input">*Year e.g 2018</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Description</label>                                    
                                </div>
                                <section id="editor" class="clearfix">
                                    <textarea name="wd[<?= $wdid ?>][Description]" style="margin-bottom: 30px;">
                                        <?= $wdInfo['desc'] ?>
                                    </textarea>
                                </section>

                                <div class="add-post-btn" style="margin: 10px 0;">
                                    <div class="pull-right">
                                        <a href="javascript:;" onclick="javascript:deleteWd(this)" class="btn-delete"><i class="ti-trash"></i> Delete This</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="clearfix" style="margin: 10px 0;">
                        <div class="add-post-btn">
                            <div class="pull-left">
                                <a href="javascript:add('work')" class="btn-added"><i class="ti-plus"></i> Add New Experience</a>
                            </div>
                        </div> 
                    </div>
                    <div class="divider"><h3>Skills</h3></div>
                    <?php for ($i = 1; $i < 6; $i++): ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="textarea">Skill Name</label>
                                    <input class="form-control" placeholder="Skill name, e.g. HTML" type="text" name="skill[<?= $i ?>][name]" value="<?= $resume->skillJson[$i]['name'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="select">Proficiency</label>
                                    <div class="search-category-container">
                                        <label class="styled-select">
                                            <select name="skill[<?= $i ?>][value]" class="dropdown-product selectpicker">
                                                <?php foreach ($this->config->item('perList') as $id => $name): ?>
                                                    <option value="<?= $id ?>" <?= $resume->skillJson[$i]['value'] == $id ? 'selected' : '' ?>><?= $name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                    <div class="form-group">
                        <div class="button-group">
                            <div class="action-buttons">
                                <div class="upload-button">
                                    <button class="btn btn-common">Choose Your CV</button>
                                    <input name="coverFile" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-common">Save</button>
                    </form>
                </div>
            </div>
        </div>
</section>
<script>
    var eduHtml = $('.eduDiv').first().html();
    var eduDiv = $('#Education');
    var wdHtml = $('.append').first().html();
    var wdDiv = $('#Work');
    var en = 1;
    var wn = 1;
    function add(type) {
        if (type == 'edu') {
			var html_base = $('<div class="eduDiv"></div>');
            en++;
            var new_base = html_base.append(eduHtml);
			eduDiv.append(new_base);
            $('.eduDiv').last().attr('id', 'edu_' + en);
            $('#edu_' + en).find('input[name="edu[1][Name]"]').attr('name', 'edu[' + en + '][Name]');
            $('#edu_' + en).find('input[name="edu[1][School]"]').attr('name', 'edu[' + en + '][School]');
            $('#edu_' + en).find('input[name="edu[1][From]"]').attr('name', 'edu[' + en + '][From]');
            $('#edu_' + en).find('input[name="edu[1][End]"]').attr('name', 'edu[' + en + '][End]');
            $('.selectpicker').selectpicker('refresh');
        } else {
			var html_base_wd = $('<div class="wdDiv"></div>');
            wn++;
			var new_base_wd = html_base_wd.append(wdHtml);
            wdDiv.append(new_base_wd);
            $('.wdDiv').last().attr('id', 'wd_' + wn);
            $('#wd_' + wn).find('input[name="wd[1][Name]"]').attr('name', 'wd[' + wn + '][Name]');
            $('#wd_' + wn).find('input[name="wd[1][jobType]"]').attr('name', 'wd[' + wn + '][jobType]');
            $('#wd_' + wn).find('input[name="wd[1][From]"]').attr('name', 'wd[' + wn + '][From]');
            $('#wd_' + wn).find('input[name="wd[1][End]"]').attr('name', 'wd[' + wn + '][End]');
            $('.selectpicker').selectpicker('refresh');
            callText();
        }
    }
    function deleteEdu(thisHtml) {
        var n = $('div .eduDiv').length;
        if (n < 2) {
            return;
        }
        $(thisHtml).parent().parent().parent().remove();
    }
    function deleteWd(thisHtml) {
        var n = $('div .wdDiv').length;
        if (n < 2) {
            return;
        }
        $(thisHtml).parent().parent().parent().remove();
    }
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


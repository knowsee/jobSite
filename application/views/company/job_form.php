<?= form_open_multipart('ManagerCompany/postJob', array('class' => 'form-ad', 'name' => 'postjob')) ?>
<input type="hidden" name="jobId" value="<?= $jobs->jobId ?>" />
<div class="form-group">
    <label class="control-label">Job Title</label>
    <input type="text" class="form-control" name="jobTitle" value="<?= $jobs->jobTitle ?>">
</div>
<div class="form-group">
    <label class="control-label">Award</label>
    <div class="search-category-container">
        <label class="styled-select">
            <select name="jobAward" class="dropdown-product selectpicker">
                <option>Select Award</option>
                <?php foreach ($this->config->item('jobAward') as $id => $name): ?>
                    <option value="<?= $id ?>" <?= $jobs->jobAward == $id ? 'selected' : '' ?>><?= $name ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
</div>
<div class="form-group">
    <label class="control-label">Job Location</label>
    <div class="search-category-container">
        <label class="styled-select">
            <select name="jobLocation" class="dropdown-product selectpicker">
                <option>Job where</option>
                <?php foreach ($this->config->item('City') as $id => $name): ?>
                    <option value="<?= $id ?>" <?= $jobs->jobLocation == $id ? 'selected' : '' ?>><?= $name ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
</div>
<div class="form-group">
    <label class="control-label">Category</label>
    <div class="search-category-container">
        <label class="styled-select">
            <select name="jobType" class="dropdown-product selectpicker">
                <option>All Categories</option>
                <?php foreach ($this->config->item('JobType') as $id => $name): ?>
                    <option value="<?= $id ?>" <?= $jobs->jobType == $id ? 'selected' : '' ?>><?= $name ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
</div>
<div class="form-group">
    <label class="control-label">Job Title</label>
    <div class="search-category-container">
        <label class="styled-select">
            <select name="jobProfessor" class="dropdown-product selectpicker">
                <option>Choose Job Title</option>
                <?php foreach ($this->config->item('jobProfessor') as $id => $name): ?>
                    <option value="<?= $id ?>" <?= $jobs->jobProfessor == $id ? 'selected' : '' ?>><?= $name ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
</div>
<div class="form-group">
    <label class="control-label" for="textarea">Job Tags <span>(optional)</span></label>
    <input type="text" class="form-control" value="<?= $jobs->jobTags ?>" name="jobTags" placeholder="e.g.PHP,Social Media,Management">
</div>
<div class="form-group">
    <label class="control-label" for="textarea">Job experience <span>(years/optional)</span></label>
    <div class="search-category-container">
        <label class="styled-select">
            <select name="experience" class="dropdown-product selectpicker">
                <?php foreach ($this->config->item('workTime') as $id => $name): ?>
                    <option value="<?= $id ?>" <?= $jobs->experience == $id ? 'selected' : '' ?>><?= $name ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
</div>
<div class="form-group">
    <label class="control-label">Job salary</label>
    <div class="search-category-container">
        <label class="styled-select">
            <select name="salary" class="dropdown-product selectpicker">
                <option>Choose salary</option>
                <?php foreach ($this->config->item('Csalary') as $id => $name): ?>
                    <option value="<?= $id ?>" <?= $jobs->salary == $id ? 'selected' : '' ?>><?= $name ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
</div>  
<div class="form-group">
    <label class="control-label">Description</label>                                    
</div> 
<section id="editor">
    <textarea name="jobDescription" style="margin-bottom: 30px;">
        <?= $jobs->jobDescription ?>
    </textarea>
</section>
<div class="form-group">
    <label class="control-label">Closing Date <span>(optional)</span></label>
    <input type="text" class="form-control" value="<?= $jobs->endDay ? mdate('%Y-%m-%d', $jobs->endDay) : mdate('%Y-%m-%d', (time() + 3600 * 24 * 30)) ?>" name="endDay" placeholder="yyyy-mm-dd" >
</div> 
<button type="submit" class="btn btn-common">Submit Job</button>
</form>
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
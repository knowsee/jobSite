<div class="col-md-3 col-sm-3 col-xs-12">
    <div class="right-sideabr">
        <div class="inner-box">
            <h3>HR Manager</h3>
            <ul class="lest item">
                <li><a <?php getStyleMethod(array('ManagerCompany', 'edit')) ?> href="<?= site_url('ManagerCompany/edit') ?>">Company Information</a></li>    
                <li><a <?php getStyleMethod(array('ManagerCompany', 'joblist')) ?> href="<?= site_url('ManagerCompany/joblist') ?>">Manage Jobs</a></li>
                <li><a <?php getStyleMethod(array('ManagerCompany', 'postjob')) ?> href="<?= site_url('ManagerCompany/postjob') ?>">Post A Job</a></li>
                <li><a <?php getStyleMethod(array('ManagerCompany', 'applylist')) ?> href="<?= site_url('ManagerCompany/applylist') ?>">Manage Applications</a></li>                    
            </ul>
            <ul class="lest">
                <li><a <?php getStyleMethod(array('Index', 'member')) ?> href="<?= site_url('Index/member') ?>">Change Password</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12">
    <div class="right-sideabr">
        <div class="inner-box">
            <h3>My Job</h3>
            <ul class="lest item">
                <li><a <?php getStyleMethod(array('Seeker', 'index')) ?> href="<?= site_url('Seeker/index') ?>">My Index</a></li>
                <li><a <?php getStyleMethod(array('Seeker', 'apply')) ?> href="<?= site_url('Seeker/apply') ?>">My Apply</a></li>
                <li><a <?php getStyleMethod(array('Seeker', 'alert')) ?> href="<?= site_url('Seeker/alert') ?>">Job Invite</a></li>
                <li><a <?php getStyleMethod(array('Seeker', 'recommended')) ?> href="<?= site_url('Seeker/recommended') ?>">Job Recommended</a></li>
                <li><a <?php getStyleMethod(array('Seeker', 'resume')) ?> href="<?= site_url('Seeker/resume') ?>">Manage Resume</a></li>                    
            </ul>
            <ul class="lest">
                <li><a <?php getStyleMethod(array('Index', 'member')) ?> href="<?= site_url('Index/member') ?>">Change Password</a></li>
            </ul>
        </div>
    </div>
</div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('common/header'); ?>
<div class="content-box-large">
    <div class="panel-body">
        <?php echo form_open('admin/edit', array('class' => 'form-horizontal', 'id' => 'form-Info'), array('userId' => $userId)); ?>
        <fieldset>
            <legend><?= $controllerName ?> - <?= $actionName ?></legend>
            <div class="form-group">
                <label class="col-md-2 control-label" for="text-field">用户名称*(5位)</label>
                <div class="col-md-10">
                    <?php if($info->userName): ?>
                    <span><?=$info->userName?></span>
                    <input class="form-control" placeholder="用户名称" name="userName" value="<?= $info->userName.time() ?>" type="hidden">
                    <?php else: ?>
                    <input class="form-control" placeholder="用户名称" name="userName" value="<?= $info->userName ?>" type="text">
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="text-field">用户密码*(8位)</label>
                <div class="col-md-10">
                    <input class="form-control" placeholder="用户密码" name="userPassword" value="<?= $info->userPassword ?>" type="password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="text-field">二次确认密码*</label>
                <div class="col-md-10">
                    <input class="form-control" placeholder="二次确认密码" name="reuserPassword" value="<?= $info->userPassword ?>" type="password">
                </div>
            </div>
        </fieldset>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-12" style="margin-top:15px;" id="alertMessage"></div>
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-save"></i>
                        提交数据
                    </button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<script>
    $('form').submit(function () {
        $this = $(this);
        ajaxPostForm($this, function (data, message, code) {
            alertMsg('Info Update');
        });
    });
</script>
<?php $this->load->view('common/footer'); ?>
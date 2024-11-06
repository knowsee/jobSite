<?php $this->load->view('common/header'); ?>
<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title"><?= $controllerName ?> - <?= $actionName ?></div>
    </div>
    <div class="panel-body">
        <ul class="nav nav-tabs">
            <li role="presentation" <?php getStyleMethod(array('admin', 'index')) ?>><a href="<?= site_url('admin/index') ?>">列表</a></li>
            <li role="presentation" <?php getStyleMethod(array('admin', 'info')) ?>><a href="<?= site_url('admin/info') ?>">添加用户</a></li>
        </ul>
    </div>
    <div class="panel-body">
        <table data-table="true" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="150">ID</th>
                    <th>会员名称</th>
                    <th width="150">状态</th>
                    <th width="250">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $key => $value): ?>
                    <tr class="odd">
                        <td><?= $value['userId'] ?></td>
                        <td><?= $value['userName'] ?></td>
                        <td class="center">-</td>
                        <td class="center">
                            <span><button data-id="<?= $value['userId'] ?>" action="edit" class="btn btn-primary">编辑</button></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('button[data-id]').click(function () {
            $this = $(this);
            if($this.attr('action') == 'edit') {
                window.location.href = '<?= site_url('admin/info') ?>?userId='+$this.data('id');
            }
        });
    });
</script>
<?php $this->load->view('common/footer'); ?>
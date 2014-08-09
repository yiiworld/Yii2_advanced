<?php
use yii\web\View;
$this->title = Yii::$app->params['webname'] . "-菜单管理";
$this->registerCssFile('css/treeview.css');
\backend\assets\ArtDialogAsset::register($this);
?>
<div class="tree well">
    <ul>
        <?php foreach ($list as $v): ?>
            <li>
                <span><i class="icon-folder-open"></i> <?= $v['menuname'] ?></span>
                <a class="icon-plus" href="javascript:;"
                   onclick="add('add',<?= $v->id; ?> , <?= $v->level ?>)" title="添加"></a>
                <a class="icon-edit" href="javascript:;"
                   onclick="add('edit',<?= $v->id; ?> , <?= $v->level ?>)" title="编辑"></a>
                <a class="icon-trash" href="javascript:;" onclick="del(<?= $v->id; ?>,<?= $v->level ?>)" title="删除"></a>
                <ul>
                    <?php foreach ($v->son as $son): ?>
                        <li>
                            <span><i class="icon-minus-sign"></i> <?= $son['menuname'] ?></span>
                            <a class="icon-plus" href="javascript:;"
                               onclick="add('add',<?= $son->id; ?> , <?= $son->level ?>)" title="添加"></a>
                            <a class="icon-edit" href="javascript:;"
                               onclick="add('edit',<?= $son->id; ?> , <?= $son->level ?>)" title="编辑"></a>
                            <a class="icon-trash" href="javascript:;" onclick="del(<?= $son->id; ?>,<?= $son->level ?>)" title="删除"></a>
                            <ul>
                                <?php foreach ($son->son as $gson): ?>
                                    <li>
                                        <span><i class="<?= $gson->menuicon ?>"></i> <?= $gson['menuname'] ?></span>
                                        <a class="icon-edit" href="javascript:;"
                                           onclick="add('edit',<?= $gson->id; ?> , <?= $gson->level ?>)" title="编辑"></a>
                                        <a class="icon-trash" href="javascript:;" onclick="del(<?= $gson->id; ?>,<?= $gson->level ?>)" title="删除"></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?= \yii\helpers\Html::csrfMetaTags() ?>
<script>
    $(function () {
        $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
        $('.tree li.parent_li > span').on('click', function (e) {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(":visible")) {
                children.hide('fast');
                $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
            } else {
                children.show('fast');
                $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
            }
            e.stopPropagation();
        });
    });
    function add(act, id, level) {
        art.dialog.open('/sys/mange?id=' + id + '&level=' + level + '&act=' + act, {title: '添加游戏', width: 580, height: 330, lock: true});
    }
    function reloadmain() {
        var win = art.dialog.open.origin; //来源页面
        win.location.reload();
    }
    function del(id,level) {
        art.dialog.confirm('确定要删除？', function () {
            $.ajax({
                url: '/sys/del',
                type: 'post',
                data: 'id=' + id + '&level='+ level + '&_csrf='+$('meta[name="csrf-token"]').attr('content'),
                dataType: 'json',
                success: function (data) {
                    if (data == 1) {
                        art.dialog.tips("操作成功", 2);
                        setTimeout("reloadmain()", 800);
                    } else {
                        art.dialog.alert("操作失败");
                    }
                }
            });
        }, function () {
            art.dialog.tips('操作取消')
        });

    }
</script>

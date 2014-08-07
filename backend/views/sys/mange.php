<?php
use yii\helpers\Html;
use backend\assets\ArtDialogAsset;
ArtDialogAsset::register($this);
?>
<?php
$form = \yii\widgets\ActiveForm::begin([
    'id' => 'artform',
    'action'=>'sys/save',
])
?>
<?=
$form->field($model, 'menuname')->textInput([
    'placeholder' => '菜单名称'
]) ?>
<?php if($model->level==3 )
{
    echo $form->field($model, 'route')->textInput([
        'placeholder' => '路由地址'
    ]);
}
?>
<?= $form->field($model,'menuicon')->textInput([
    'placeholder' => '菜单Icon'
]) ?>
<?php
if($model->level == 3)
{
    echo $form->field($model,'isvisible')->checkbox(['value'=>'1']);
}
?>
<?= Html::hiddenInput('id',$model->id) ?>
<?= Html::hiddenInput('Menu[parentid]',$model->parentid) ?>
<?= Html::hiddenInput('Menu[level]',$model->level) ?>
<?php
$form->end();
?>
<script>
    function reloadmain() {
        var win = art.dialog.open.origin;//来源页面
        win.location.reload();
    }
    var Dialog = (function () {
        var parent = art.dialog.parent, // 父页面window对象
            api = art.dialog.open.api, //          art.dialog.open扩展方法
            $ = function (id) {
                return document.getElementById(id)
            };
        if (!api)
            return;
        // 自定义按钮
        api.button(
            {
                name: '确定',
                callback: function () {
                    alert(yii.getCsrfToken);
                    var form = jQuery('#artform');
                    jQuery.ajax({
                        url: form.attr('action'),
                        type: 'post',
                        data: decodeURI(form.serialize()),
                        success: function(data) {
                            if (data == 1) {
                                art.dialog.tips("操作成功", 2);
                                setTimeout("reloadmain()", 800);
                            } else {
                                art.dialog.alert("操作失败");
                            }
                        }
                    });
                    return false;
                },
                error: function () {
                    alert('出错了，请重试!');
                    return false;
                }
            },
            {
                name: '关闭'
            }
        );
    })();
</script>
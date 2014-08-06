<?php
use yii\jui\Dialog;
?>

<?php
Dialog::begin([
    'clientOptions' => [
        'modal' => false,
        'title'=>'添加用户',
        'resizable'=>true,
        'autoOpen'=>false,
        'closeOnEscape'=>'false',
        'buttons'=>[
            [
                'text'=>'确定',
            ],
            [
                'text'=>'关闭',
                'click'=>'function(){$( this ).dialog( "close" );}',
            ],
        ],
    ],
]);
?>
<?php
Dialog::end();
?>

<?php
$form = \yii\widgets\ActiveForm::begin([
    'id' => 'artform',
    'enableAjaxValidation'=>true,
    'validationUrl'=>\yii\helpers\Url::to('user/reg')
])
?>
<?=
$form->field($model, 'username')->textInput([
    'placeholder' => '用户名'
]) ?>
<?=
$form->field($model, 'password')->passwordInput([
    'placeholder' => '密码'
]) ?>
<?=
$form->field($model, 'password_repeat')->passwordInput([
    'placeholder' => '重复输入密码'
]) ?>
<?= \yii\helpers\Html::submitButton('提交',['value'=>'提交','style'=>'display:none','id'=>'submitbt']) ?>
<?php
$form->end();
?>
<script src="/assets/js/jquery-2.0.3.min.js"></script>
<script src="/js/jquery-migrate-1.0.0.js"></script>
<script src="/js/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/artDialog/plugins/iframeTools.js"></script>
<script src="/js/jquery.form.js"></script>
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
                    jQuery('#submitbt').click();
                    art.dialog.tips('添加成功',1.2);
                    setTimeout(reloadmain(),2);
                    return false;
                },
                error: function () {
                    alert('出错了，请重试!');
                    return false;
                }
            },
            {
                name: '取消'
            }
        );
    })();
</script>
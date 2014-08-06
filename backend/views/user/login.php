<?php
use yii\widgets\ActiveForm;
$this->title = "登录页面";
?>
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="icon-leaf green"></i>
                            <span class="red">Ace</span>
                            <span class="white">Application</span>
                        </h1>
                        <h4 class="blue">&copy; 大裤衩子</h4>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="icon-coffee green"></i>
                                        请输入登录信息
                                    </h4>

                                    <div class="space-6"></div>

                                    <?php $form = ActiveForm::begin([
                                        'id' => 'login-form',
                                        'fieldConfig' => [
                                            'template' => "{input}\n<div class=\"col-lg-8\">{error}</div>",
                                        ],
                                    ]) ?>
                                        <fieldset>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <?= $form->field($model, 'username')->textInput(['class'=>'form-control','placeholder'=>'用户名']) ?>
                                                    <i class="icon-user pull-right"></i>
                                                </span>
                                            </label>

                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control','placeholder'=>'密码']) ?>
                                                    <i class="icon-lock"></i>
                                                </span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input name="User[rememberMe]" type="checkbox" class="ace" />
                                                    <span class="lbl"> 记住我</span>
                                                </label>
                                                <button type="button" onclick="submitfm('login-form')" class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="icon-key"></i>
                                                    登陆
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    <?php ActiveForm::end() ?>

                                    <div class="social-or-login center">
                                        <span class="bigger-110">或者用以下方式登录</span>
                                    </div>

                                    <div class="social-login center">
                                        <a class="btn btn-primary">
                                            <i class="icon-facebook"></i>
                                        </a>

                                        <a class="btn btn-info">
                                            <i class="icon-twitter"></i>
                                        </a>

                                        <a class="btn btn-danger">
                                            <i class="icon-google-plus"></i>
                                        </a>
                                    </div>
                                </div><!-- /widget-main -->

                                <div class="toolbar clearfix">
                                    <div>
                                        <a href="#" onclick="show_box('forgot-box');
                                                return false;" class="forgot-password-link">
                                            <i class="icon-arrow-left"></i>
                                            忘记密码
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" onclick="show_box('signup-box');
                                                return false;" class="user-signup-link">
                                            注册
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- /widget-body -->
                        </div><!-- /login-box -->

                        <div id="forgot-box" class="forgot-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header red lighter bigger">
                                        <i class="icon-key"></i>
                                        找回密码
                                    </h4>

                                    <div class="space-6"></div>
                                    <p>
                                        请输入邮箱
                                    </p>

                                    <form>
                                        <fieldset>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="email" class="form-control" placeholder="邮箱" />
                                                    <i class="icon-envelope"></i>
                                                </span>
                                            </label>

                                            <div class="clearfix">
                                                <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                                    <i class="icon-lightbulb"></i>
                                                    发送!
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div><!-- /widget-main -->

                                <div class="toolbar center">
                                    <a href="#" onclick="show_box('login-box');
                                            return false;" class="back-to-login-link">
                                        返回登录
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </div>
                            </div><!-- /widget-body -->
                        </div><!-- /forgot-box -->

                        <div id="signup-box" class="signup-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header green lighter bigger">
                                        <i class="icon-group blue"></i>
                                        注册新用户
                                    </h4>

                                    <div class="space-6"></div>
                                    <p> 填写详情信息: </p>

                                        <?php $regform = ActiveForm::begin([
                                            'id'=>'reg-form',
                                            'action'=> '/user/reg',
                                            'enableAjaxValidation'=>true,
                                            'validationUrl'=>'user/reg',
                                            'fieldConfig' => [
                                                'template' => "{input}\n<div class=\"col-lg-8\">{error}</div>",
                                            ],
                                        ]) ?>
                                        <fieldset>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <?= $regform->field($adminuser, 'username')->input('text', [
                                                        'class'=>'form-control',
                                                        'placeholder'=>'用户名'
                                                    ]); ?>
                                                    <i class="icon-user"></i>
                                                </span>
                                            </label>

                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <?= $regform->field($adminuser, 'password')->passwordInput([
                                                        'class'=>'form-control',
                                                        'placeholder'=>'密码',
                                                    ]) ?>
                                                    <i class="icon-lock"></i>
                                                </span>
                                            </label>

                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <?= $regform->field($adminuser, 'password_repeat')->passwordInput([
                                                        'class'=>'form-control',
                                                        'placeholder'=>'再次输出密码'
                                                    ]); ?>
                                                    <i class="icon-retweet"></i>
                                                </span>
                                            </label>

                                            <label class="block">
                                                <input type="checkbox" class="ace" />
                                                <span class="lbl">
                                                    我接受
                                                    <a href="#">用户协议</a>
                                                </span>
                                            </label>

                                            <div class="space-24"></div>

                                            <div class="clearfix">
                                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                                    <i class="icon-refresh"></i>
                                                    重置
                                                </button>

                                                <button type="button" onclick="submitfm('reg-form')" class="width-65 pull-right btn btn-sm btn-success">
                                                    注册
                                                    <i class="icon-arrow-right icon-on-right"></i>
                                                </button>
                                            </div>
                                        </fieldset>
                                        <?php $regform->end() ?>
                                </div>

                                <div class="toolbar center">
                                    <a href="#" onclick="show_box('login-box');
                                            return false;" class="back-to-login-link">
                                        <i class="icon-arrow-left"></i>
                                        返回登录
                                    </a>
                                </div>
                            </div><!-- /widget-body -->
                        </div><!-- /signup-box -->
                    </div><!-- /position-relative -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div><!-- /.main-container -->
<script type="text/javascript">
    function show_box(id) {
        jQuery('.widget-box.visible').removeClass('visible');
        jQuery('#' + id).addClass('visible');
    }
    function submitfm(id)
    {
        jQuery('#'+id).submit();
    }
</script>
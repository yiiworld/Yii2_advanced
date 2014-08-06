<?php 
$this->title = Yii::$app->params['webname']."-首页";
?>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="alert alert-block alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="icon-remove"></i>
                </button>

                <i class="icon-ok green"></i>

                欢迎使用
                <strong class="green">
                    <?= Yii::$app->params['webname'] ?>
                </strong>
                ,请谨慎操作！！`(*∩_∩*)′	
            </div>

        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
<?php

use yii\helpers\Html;
use yii\web\View;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?= Yii::$app->charset ?>" />
        <title><?= Html::encode($this->title) ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- basic styles -->

        <link href="/core-assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/core-assets/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="/core-assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->

        <!-- fonts -->
        <!-- ace styles -->

        <link rel="stylesheet" href="/core-assets/css/ace.min.css" />
        <link rel="stylesheet" href="/core-assets/css/ace-rtl.min.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="/core-assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="/core-assets/js/html5shiv.js"></script>
        <script src="/core-assets/js/respond.min.js"></script>
        <![endif]-->
        <?php $this->head() ?>
    </head>
    <body <?php if(Yii::$app->controller->route=='user/login'): ?> class="login-layout" <?php endif; ?>>
        <?php $this->beginBody() ?>
        <?= $content ?>
    </body>
    <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
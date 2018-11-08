<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\Pjax;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <!--    --><? //= $this->render('_head.php',compact('headerContent')) ?>
    <?= $this->render('_head.php') ?>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body class="wrap">
<?php $this->beginBody() ?>

<!--    --><? //= $this->render('_header.php',compact('headerContent')) ?>
<?= $this->render('_header.php') ?>
<?= $this->render('_top_catalog.php') ?>

<main class="main-content">
    <?= Alert::widget() ?>
    <?= $content ?>
</main>

<?= $this->render('_footer.php') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

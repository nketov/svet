<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <!--    --><? //= $this->render('_header.php',compact('headerContent')) ?>
    <?= $this->render('_header.php') ?>

    <aside class="left">Фильтр</aside>
    <main class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </main>
    <?= $this->render('_footer.php') ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

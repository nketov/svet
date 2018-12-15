<?php

use yii\helpers\StringHelper;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<img src="/images/articles/<?= $model->image_name ?>" alt="" style="width: 100%; margin-top: 25px;">
<div class="article-preview">
    <h2><?= $model->header ?></h2>
    <div><?= StringHelper::truncate($model->content, 500, '',null, true).'<br>'. Html::a('Читать дальше...',  Url::to('/article/'.$model->id)) ?></div>
</div>



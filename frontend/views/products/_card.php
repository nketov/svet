<?php

use yii\helpers\StringHelper;

?>

<div class="card-contur"></div>

<?php if ($model->images_count > 0) { ?>
    <img class="card-img" src="/images/products/<?= $model->getFirstImage() ?>"/>
<?php } else { ?>
    <img class="card-img empty" src="/images/main/logo.png"/>
<?php } ?>

<div class="card-text">
    <span class="card-text-text"><?= StringHelper::truncate($model->name, 42) ?></span><span
            class="card-price"><?= $model->price >0 ?$model->price.' грн' : 'Цена не указана' ?></span></p>
</div>
<div class="info_hover">
    <button class="btn btn-primary">ДОБАВИТЬ В КОРЗИНУ</button>
    <p style="font-size: .7rem; font-weight: lighter">Артикул: <?= $model->code ?></p>
</div>

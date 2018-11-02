<?php

use common\models\Product;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$background = '';


if ($image = $model->key) {
    $productModel = Product::findOne($model->product);

    $background = 'style="background-image: url(/images/products/' . $productModel->$image . ')"';
} else {
    $model->key = 'new';}

?>

<div class="box ">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'action' => '/admin/products/update?id=' . $model->product,
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>

        <?= Html::submitButton('Сохранить фото', [
            'class' => 'btn btn-lg btn-primary',
            'style' => 'margin: 15px auto'
        ]) ?>

        <?php if ($image = $model->key) echo Html::button('Удалить фото', [
            'class' => 'btn btn-lg btn-danger',
            'style' => 'margin: 15px auto'
        ]) ?>

        <div id="image-preview" <?= $background ?> >
            <label for="image-upload" id="image-label">Выберите фото</label>
            <input type="text" name="ImageUploadForm[key]" value="<?= $model->key ?>" hidden/>
            <input type="text" name="ImageUploadForm[product]" value="<?= $model->product ?>" hidden/>
            <input type="file" name="ImageUploadForm[image]" id="image-upload"/>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>

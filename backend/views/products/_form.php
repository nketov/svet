<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['id' => 'form-product-update']); ?>
<div class="form-grid">
<!--    --><?//= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shop')->dropDownList(Product::shopNamesList()); ?>

    <?= $form->field($model, 'active')->dropDownList(Product::getStatuses()) ?>

    <?= $form->field($model, 'category')->dropDownList(Product::categoryNamesList()) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>


    <? //= $form->field($model, 'image_1')->textInput(['maxlength' => true]) ?>
    <!---->
    <? //= $form->field($model, 'image_2')->textInput(['maxlength' => true]) ?>
    <!---->
    <? //= $form->field($model, 'image_3')->textInput(['maxlength' => true]) ?>
    <!---->
    <? //= $form->field($model, 'image_4')->textInput(['maxlength' => true]) ?>
    <!---->
    <? //= $form->field($model, 'image_5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lamps')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'diametr')->textInput() ?>

    <?= $form->field($model, 'width')->textInput() ?>

    <?= $form->field($model, 'depth')->textInput() ?>

<!--    --><?//= $form->field($model, 'second_code')->textInput(['maxlength' => true]) ?>

</div>

<div class="form-footer">
    <?= $form->field($model, 'description')->textarea(['rows' => 10]) ?>

    <div class="form-group" style="text-align: center">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-lg btn-success',]) ?>
    </div>

</div>

<?php ActiveForm::end(); ?>



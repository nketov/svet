<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shop')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'category')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'images_count')->textInput() ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'diametr')->textInput() ?>

    <?= $form->field($model, 'width')->textInput() ?>

    <?= $form->field($model, 'depth')->textInput() ?>

    <?= $form->field($model, 'lamps')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'second_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

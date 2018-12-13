<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($model, 'header')->textInput() ?>

<?= $form->field($model, 'content')->textarea(['rows' => '5']) ?>

<?= $form->field($model, 'image')->fileInput() ?>

    <img src="<?= '/images/articles/' . $model->image_name.'?rnd=' . time() ?>" alt="" style="height:77px;width: 75px">

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary center-block']) ?>
    </div>

<?php ActiveForm::end(); ?>
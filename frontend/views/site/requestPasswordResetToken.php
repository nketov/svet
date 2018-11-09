<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Запрос на смену пароля';

?>
<div class="container-login">


    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'options' => [
        'class' => 'login-form'
    ]]); ?>
    <p>Пожалуйста, укажите свой E-mail, на него будет выслана ссылка на восстановление
        пароля.</p>

    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

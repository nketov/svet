<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="site-login">

        <br><br>
        <br><br>
        <br><br>
        <br><br>
        <br>  <br>
        <br><br>
        <br><br>
        <br><br>
        

        <section class="b-login">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                    </div>
        <div class="col-lg-4 col-md-4">
            <p>Пожалуйста, выберите новый пароль:</p>
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
                    <div class="col-lg-4 col-md-4">
                    </div>
                </div>
            </div>
    </div>
</section>
</div>
</section>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br> <br><br>
<br><br><br><br><br><br>

<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="container">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div style="color:#999;margin:1em 0; ; text-align: center ">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-lg', 'name' => 'login-button']) ?>
    </div>

    <div style="color:#999;margin:1em 0; text-align: center">
        Если Вы забыли пароль, можете его <?= Html::a('восстановить', ['site/request-password-reset']) ?>.
    </div>

    <div style="color:#999;margin:1em 0; ; text-align: center ">
        Если Вы новый пользователь, то можете <?= Html::a('зарегистрироваться', ['signup']) ?>.
    </div>



    <?php ActiveForm::end(); ?>
</div>







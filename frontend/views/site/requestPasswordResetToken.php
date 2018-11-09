<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Запрос на смену пароля';

?>
<div class="site-request-password-reset">

    <section>

        <div class="site-login">

            <br>
            <br><br><br><br><br>
            <br><br><br><br><br>

            <section class="b-login">
                <div class="container">
                    <?php
                    /*
                          var_dump(  Yii::$app->mailer->compose()
                                ->setTo('ketovnv@gmail.com')
                                ->setFrom(['mail@lion-auto.com.ua' => 'lion'])
                                ->setSubject('Test')
                                ->setHtmlBody('Test')
                    //            ->setTextBody($this->text)
                                ->send());


                            var_dump(mail('ketovnv@gmail.com','Test','Text'));


                            exit;
                    */
                    ?>


                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <p>Пожалуйста, укажите свой E-mail, на него будет выслана ссылка на восстановление
                                пароля.</p>

                            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
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
<br><br>
<br><br><br>
<br><br>
<br><br>
<br><br>


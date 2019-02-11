<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование цветов';

?>

<div class="box ">
    <div class="box-body">

        <?php $form = ActiveForm::begin(['id' => 'form-colors']); ?>
        <div class="form-grid">
            <?php
            foreach ($colors as $key => $color) {
                if($key==999) continue;
                echo ' <div class="form-group">';
                echo Html::textInput( 'color_' . $key, $color, ['class' => 'form-control']);
                echo '</div>';
            }
            echo ' <div class="form-group">';
            echo Html::textInput( 'new_color', '', ['class' => 'form-control','placeholder'=> 'Новый цвет']);
            echo '</div>';
            ?>
        </div>

        <div class="form-footer">

            <div class="form-group" style="text-align: center">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-lg btn-primary',]) ?>
            </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>



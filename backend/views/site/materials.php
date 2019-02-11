<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование материалов';

?>

<div class="box ">
    <div class="box-body">

        <?php $form = ActiveForm::begin(['id' => 'form-materials']); ?>
        <div class="form-grid">
            <?php
            foreach ($materials as $key => $material) {
                echo ' <div class="form-group">';
                echo Html::textInput( 'material_' . $key, $material, ['class' => 'form-control']);
                echo '</div>';
            }
            echo ' <div class="form-group">';
            echo Html::textInput( 'new_material', '', ['class' => 'form-control','placeholder'=> 'Новый материал']);
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



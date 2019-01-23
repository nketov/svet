<?php
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;

Pjax::begin(['id' => 'pjax_form']);
$form = ActiveForm::begin([
    'method' => 'get',
    'action' => '/search',
    'id' => 'left-filter-form',
    'options' => [
        'data-pjax' => 1
    ],
]) ?>


<?= $form->field($searchModel, 'text')->label(false)->textInput()?>

<?php ActiveForm::end();
Pjax::end();
?>
<?php use yii\bootstrap\Button;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Product;

$form = ActiveForm::begin(['id' => 'excel-upload', 'options' => ['enctype' => 'multipart/form-data']]);


echo '<div class="box" style="width: 662px"><div class="box-body uploader-panel">';

$this->title = 'Загрузка товаров для магазинов из файла ".xls"';

echo $form->field($model, 'shop')->dropDownList([
    '' => 'Выберите магазин',
    '0' => Product::shopName(0),
    '1' => Product::shopName(1),
    '2' => Product::shopName(2),
    '3' => Product::shopName(3),
]);

echo $form->field($model, 'excelFile')->fileInput();

echo Button::widget([
    'label' => 'Загрузить данные из файла',
    'options' => ['class' => 'btn-primary'],
]);


echo '</div></div>';

ActiveForm::end() ?>
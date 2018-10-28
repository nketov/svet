<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Product;


$form = ActiveForm::begin(['id' => 'excel-upload', 'options' => ['enctype' => 'multipart/form-data']]);

echo '<div class="box" style="width: 662px"><div class="box-body">';


if ($message) {

    $this->title = $title;
    echo $message;
} else {

    $this->title = 'Загрузка прайсов магазинов из файлов ".xls"';

    echo $form->field($model, 'shop')->dropDownList([
        '' => 'Выберите магазин',
        '0' => Product::shopName(0),
        '1' => Product::shopName(1),
        '2' => Product::shopName(2),
        '3' => Product::shopName(3),
    ]);

    echo $form->field($model, 'excelFile')->fileInput();

    echo '<button class="btn btn-primary" style="margin-left: 420px; align-self: ">Загрузить данные из файла</button>';
}

echo '</div></div>';

ActiveForm::end() ?>
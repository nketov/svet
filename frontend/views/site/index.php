<?php use kartik\slider\Slider;
use common\models\Product;
use yii\bootstrap\ActiveForm;
use frontend\components\Card;

$model = new Product();

?>
<div class="content-header">Большие люстры</div>

<aside class="left">
    <?php
    $form = ActiveForm::begin([
        'method' => 'get',
        'action' => '/excel',
        'id' => 'search-form',
        'options' => ['class' => 'form-horizontal 	b-search__main',
            'data-pjax' => 1
        ],
    ]) ?>

    <h3 style="font-weight: bold">Подбор по параметрам:</h3>
    <br><br>
    <label>Цена</label><br>
    <?php
    echo Slider::widget([
            'id' => 'price',
            'name' => 'Product[price]',
            'value' => '2500,10000',
            'sliderColor' => Slider::TYPE_PRIMARY,
            'pluginOptions' => [
                'min' => 100,
                'max' => 30000,
                'step' => 10,
                'range' => true
            ],
        ]) . '<br><br> oт <b class="badge bage-min">2500 грн</b> до <b class="badge bage-max">10000 грн</b>';
    ?>

    <br>
    <br>
    <label>Материал</label><br>
    <?=
    $form->field($model, 'material')->label(false)->checkboxList(
        ['Металл' => 'Металл', 'Стекло' => 'Стекло', 'Дерево' => 'Дерево', 'Пластик' => 'Пластик'])
    ?>
    <?php ActiveForm::end() ?>
</aside>

<div class="cards-block">
    <?php foreach ($products as $product) {
        echo Card::widget(['product' => $product]);
    } ?>
</div>

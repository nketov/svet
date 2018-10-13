<?php use kartik\slider\Slider;
use common\models\Product;
use yii\bootstrap\ActiveForm;

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
        ['Металл'=> 'Металл', 'Стекло'=> 'Стекло', 'Дерево'=> 'Дерево', 'Пластик'=> 'Пластик'])
    ?>
    <?php ActiveForm::end() ?>
</aside>
<container>
    <article class="article">
        <?php for($i=0; $i<12; $i++ ){ ?>
        <div class="card">
            <div class="card-contur"></div>
            <div class="card-img"></div>
            <div class="card-text">
                <span class="card-text-text">Люстры 19605 серии <br> "Босфор Crystal"</span><span class="card-price"><?= round(25000/($i+1),2) ?> грн</span></p>
            </div>
            <div class="info_hover">
                <button class="btn btn-primary">ДОБАВИТЬ В КОРЗИНУ</button>
                <p style="font-size: .7rem; font-weight: lighter">Артикул: 40807-cl6-pla000-cp000</p>
            </div>
        </div>
  <?php } ?>

    </article>
</container>
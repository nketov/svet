<?php use kartik\slider\Slider;
use common\models\Product;
use yii\bootstrap\ActiveForm;
use frontend\components\Card;
use yii\widgets\ListView;


if(isset($searchModel->category)){
    $this->title = Product::categoryName($searchModel->category);
    $formTarget= '/category/'.(int)$searchModel->category;
} else {
    $this->title = 'Все категории';
    $formTarget= '/';
}?>

<div class="content-header"><?=  $this->title ?></div>

<aside class="left">
    <?php
    $form = ActiveForm::begin([
        'method' => 'get',
        'action' => $formTarget,
        'id' => 'left-filter-form',
        'options' => ['class' => 'form-horizontal 	b-search__main',
            'data-pjax' => 1
        ],
    ]) ?>

    <h3 style="font-weight: bold">Подбор по параметрам:</h3>

    <div class="form-group field-productsearch-prices">
    <label class="control-label">Цена</label><br>
    <?php
    echo Slider::widget([
            'id' => 'prices',
            'name' => 'ProductSearch[prices]',
            'value' => $searchModel->prices[0].','.$searchModel->prices[1],
            'sliderColor' => Slider::TYPE_PRIMARY,
            'pluginOptions' => [
                'min' => 1,
                'max' => Product::maxPrice(),
                'step' => 1,
                'range' => true
            ],
            'pluginEvents' => [
            "slideStop" => "function() { $(this).closest('form').submit(); }",
             ]
        ]) . '<div class="slider-text">oт <b class="badge bage-min">'.$searchModel->prices[0].' грн</b> до <b class="badge bage-max">'.$searchModel->prices[1].' грн</b></div>';
    ?>
    </div>


<!--    --><?//=
//    $form->field($searchModel, 'material')->checkboxList(
//        ['Металл' => 'Металл', 'Стекло' => 'Стекло', 'Дерево' => 'Дерево', 'Пластик' => 'Пластик'])
//    ?>

    <?= $form->field($searchModel, 'withoutPricesShow')->checkbox();?>

    <?= $form->field($searchModel, 'withoutImageShow')->checkbox();?>


    <?php ActiveForm::end() ?>
</aside>


    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'section',
            'class' => 'list-wrapper',
            'id' => 'category-list-wrapper',
        ],
        'layout' => '<div class="cards-block">{items}</div>{summary}{pager}',
        'itemOptions' => ['class' => 'card'],
        'itemView' => '_card'
    ]) ?>




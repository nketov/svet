<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Product;
use dosamigos\tinymce\TinyMce;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['id' => 'form-product-update']); ?>
<div class="form-grid">
    <!--    --><? //= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shop')->dropDownList(Product::shopNamesList()); ?>

    <?= $form->field($model, 'collection')->dropDownList(Product::collectionsNamesList(), ['prompt' => 'Не указана']) ?>

    <?= $form->field($model, 'active')->dropDownList(Product::getStatuses()) ?>

    <?= $form->field($model, 'category')->dropDownList(Product::categoryNamesList(), ['id' => 'cat-id']) ?>

    <?= $form->field($model, 'sub_category')->widget(DepDrop::classname(), [
      //        'type' => DepDrop::TYPE_SELECT2,
        'select2Options' => [
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ],
        'pluginOptions' => [
            'depends' => ['cat-id'],
            'url' => Url::to(['/products/sub-categories?selected='.$model->sub_category]),
            'loadingText' => 'Загрузка ...',
            'placeholder' => 'Не указана',
            'initialize' => true,
        ],
    ]);
    ?>


    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>


    <? //= $form->field($model, 'image_1')->textInput(['maxlength' => true]) ?>
    <!---->
    <? //= $form->field($model, 'image_2')->textInput(['maxlength' => true]) ?>
    <!---->
    <? //= $form->field($model, 'image_3')->textInput(['maxlength' => true]) ?>
    <!---->
    <? //= $form->field($model, 'image_4')->textInput(['maxlength' => true]) ?>
    <!---->
    <? //= $form->field($model, 'image_5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->dropDownList(Product::colorsNamesList(), ['prompt' => 'Не указан']) ?>

    <?= $form->field($model, 'material')->dropDownList(Product::materialsNamesList(), ['prompt' => 'Не указан']) ?>

    <?= $form->field($model, 'color_base')->dropDownList(Product::colorsNamesList(), ['prompt' => 'Не указан']) ?>

    <?= $form->field($model, 'material_base')->dropDownList(Product::materialsNamesList(), ['prompt' => 'Не указан']) ?>

    <?= $form->field($model, 'lamps')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'diametr')->textInput() ?>

    <?= $form->field($model, 'width')->textInput() ?>

    <?= $form->field($model, 'depth')->textInput() ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'size')->textInput() ?>

    <!--    --><? //= $form->field($model, 'second_code')->textInput(['maxlength' => true]) ?>

</div>

<div class="form-footer">
    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 10],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]) ?>

    <div class="form-group" style="text-align: center">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-lg btn-primary',]) ?>
    </div>

</div>

<?php ActiveForm::end(); ?>



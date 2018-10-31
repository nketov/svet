<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
?>
<div class="box">
    <div class="box-body">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--            --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//                'class' => 'btn btn-danger',
//                'data' => [
//                    'confirm' => 'Are you sure you want to delete this item?',
//                    'method' => 'post',
//                ],
//            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'code',
                'shop',
                'active',
                'category',
                'name',
                'price',
                'description:ntext',
                'image_1',
                'image_2',
                'image_3',
                'image_4',
                'image_5',
                'images_count',
                'color',
                'material',
                'height',
                'diametr',
                'width',
                'depth',
                'lamps',
                'second_code',
            ],
        ]) ?>

    </div>
</div>

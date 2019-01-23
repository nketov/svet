<?php


use common\models\Product;
use yii\widgets\ListView;
use yii\widgets\Pjax;


$this->title = 'Поиск :';
$formTarget = '/catalog';
?>
<!---->
<div class="content-header"><?= $this->title ?></div>

<aside class="left">
    <?php echo $this->render('_text_search', compact('searchModel')); ?>
</aside>

<?php Pjax::begin(['id' => 'pjax_list']); ?>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'tag' => 'section',
        'class' => 'list-wrapper',
        'id' => 'category-list-wrapper',
    ],
    'pager' => [
        'firstPageLabel' => 'Первая',
        'lastPageLabel' => 'Последняя',
        'prevPageLabel' => '<span class="glyphicon glyphicon-chevron-left"></span>',
        'nextPageLabel' => '<span class="glyphicon glyphicon-chevron-right"></span>',
        'maxButtonCount' => 6,
    ],

    'layout' => '<div class="cards-block">{items}</div>{summary}{pager}',
    'itemOptions' => ['class' => 'card'],
    'itemView' => '_card'
]) ?>
<?php Pjax::end(); ?>



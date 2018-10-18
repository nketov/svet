<?php use kartik\slider\Slider;
use common\models\Product;
use yii\bootstrap\ActiveForm;

$model = new Product();
?>
<div class="content-header">"Босфор Crystal"</div>

<div class="image_container">
    <img class="image" id="image" src="/images/lamps/lamp001.jpg"/>
</div>

<container>
    <div class="cards-block">
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

    </div>
</container>
<?php
   require("_social.php");
?>
<br><br><br>
<? use common\models\Excel;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

if (!Yii::$app->user->isGuest) {
    $string = $user->phone;
    $phone_string= '+38 (0'.$string[0].$string[1].') '.$string[2].$string[3].$string[4].' '.$string[5].$string[6].' '.$string[7].$string[8]
    ?>
    <section class="b-error">
        <div class="container">
            <br><br>
            <div class="cabinet">
                <br> <br>
                <br> <br>
                <div class=row>

                    <div id="history" class="col-md-3">
                        <h3 class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">История заказов</h3>
                        <p class="wow zoomInUp" data-wow-delay="0.7s">Задолженность: 0 грн</p>
                        <h3 class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">Персональные предложения</h3>
                        <?php if (array_key_exists('*', $actions)) echo '<h4 style="color: #0D3349" class=" wow zoomInUp" data-wow-delay="0.7s">Скидка на все остальные товары: <span style="color:#1EBB30;font-size: 2rem ">' . $actions['*'] . '%</span></h4>' ?>
                        <?php if (!array_key_exists('*', $actions)) echo '<p class="wow zoomInUp" class=" wow zoomInUp" data-wow-delay="0.7s">У вас нет скидки. Обратитесь к менеджеру сайта.</p>' ?>
                        <h3 class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">Ваш номер телефона</h3>
                        <p class="wow zoomInUp" data-wow-delay="0.7s"><?= $phone_string ?> <a href="" title="Изменить"><i
                                        class="fa fa-pencil-square-o phone-change" aria-hidden="true"></i></a></p>
                        <h3 class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">Оставить комментарий</h3>
                        <p class="wow zoomInUp" data-wow-delay="0.7s"><a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=700,height=400');" href="javascript: void(0)">
    <span class="fa fa-facebook-square" ></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://plus.google.com/share?url=http://lion-auto.com.ua"><span class="fa fa-google-plus-square"></span></a></p>

                    </div>
                    <div id="history" class="col-md-1">
                    </div>
                    <div style="text-align:left" class="col-md-7">
                        <h3 style="text-align:left; font-size:14px; padding-top:12px;"
                            class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">
                            Специальные предложения</h3>

                        <div class=row>
                            <div class="col-lg-12 col-md-12">
                                <table class="table table-hover table-responsive table-striped">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Товар</th>
                                        <th>Код</th>
                                        <th>Цена</th>
                                        <th>Скидка</th>
                                        <th style="padding:10px;color: #00a157;text-align: right">Цена со скидкой</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <?php foreach ($actions as $key => $action) {

                                        $product = Excel::findOne(['code' => $key]);
                                        if (!empty($product)) {
                                            $price = round($product->price * $currency, 2);
                                            $price2 = round($product->getDiscountPrice() * $currency, 2);
                                            ?>
                                            <tr>
                                                <td style="padding:10px"><?= $product->name ?></td>
                                                <td style="padding:10px"><?= $key ?></td>
                                                <td style="padding:10px"><?= $price . '&nbsp' . $currencySign ?></td>
                                                <td style="padding:10px"><?= $action . '&nbsp%' ?></td>
                                                <td style="padding:10px;color: #00a157;text-align: right">
                                                    <b><?= $price2 . '&nbsp' . $currencySign ?></b></td>
                                                <td style="padding:10px">
                                                    <button type="button" class="btn btn-primary btn-sm cart-view"
                                                            data-id="<?= $product->id ?>" title="Просмотр"><i
                                                                class="fa fa-eye"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } ?>
                                </table>
                            </div>
                        </div>

                        <?php if (!empty($lastOrders)) { ?>
                        <div class=row>
                            <h5 style="text-align: center">Последние заказы:</h5>
                            <div class="col-lg-12 col-md-12">
                                <table class="table table-hover table-responsive table-striped">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Номер</th>
                                        <th>Дата</th>
                                        <th>Состояние</th>

                                    </tr>
                                    </thead>
                                    <?php foreach ($lastOrders as $order) {
                                            ?>
                                            <tr>
                                                <td style="padding:10px">№ <?= $order->id ?></td>
                                                <td style="padding:10px"><?= $order->date ?></td>
                                                <td style="padding:10px"><b><?= \common\models\Order::getStatuses()[$order->status] ?></b></td>
                                            </tr>
                                            <?php
                                    } ?>


                                </table>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <!--			    		        <p class="wow zoomInUp" data-wow-delay="0.7s">В данный момент страница с информацией находится в разработке</p>-->
                </div>
            </div>
        </div>
        <h3 class="s-title wow zoomInUp" data-wow-delay="0.7s">Мой кабинет</h3>
        </div>

        <div id="phone-modal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document" >
                <div class="modal-content">
                    <?php $form = ActiveForm::begin([
                        'enableClientValidation'=>true,
                    ]); ?>
                    <div class="modal-header" style="text-align: center">
                        <h5 class="modal-title">Укажите номер телефона</h5>
                    </div>
                    <div class="modal-body" style="text-align: center; height: 70px;">
                        <?php
                        echo $form->field($user, 'phone')->label(false)->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '+38 (099) 999 99 99',
                            'clientOptions'=>[
                                'removeMaskOnSubmit' => true,
                            ]
                        ])->textInput(['style' => 'width:165px;margin: 0 auto;']);
                        ?>
                    </div>
                    <div class="modal-footer" style="text-align: center">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>

    </section>
<?php } ?>
				


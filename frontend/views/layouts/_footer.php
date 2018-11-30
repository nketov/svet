<?php

use yii\helpers\Html;

?>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h5>Старт</h5>
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/catalog">Каталог</a></li>
                    <li><a href="/login">Вход</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h5>О нас</h5>
                <ul>
                    <li><a href="#">Статьи</a></li>
                    <li><a href="/actions">Акции и скидки</a></li>
                    <li><a href="/contact">Вопросы</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h5>Контакты</h5>
                <ul class="footer-contacts">
                    <li><img src="/images/icons/<?=$siteContent->phone_footer_icon ?>" alt="">&nbsp&nbsp<?=$siteContent->phone_footer ?></li>
                    <li><img src="/images/icons/email.png" alt="">&nbsp&nbspsvitlograd.krm@gmail.com
                    </li>
                    <li><img src="/images/icons/icq.png" alt="">&nbsp&nbsp<?=$siteContent->icq ?></li>
                </ul>
            </div>
        </div>
        <!-- Here we use the Google Embed API to show Google Maps. -->
        <!-- In order for this to work in your project you will need to generate a unique API key.  -->
        <iframe id="map-container" frameborder="0" style="border:0"
                src="https://www.google.com/maps?q=48.72559, 37.6001&z=17&output=embed" >
        </iframe>
    </div>
    <div class="social-networks">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
    </div>
    <div class="footer-copyright">
        <p>© 2018 Kramatorsk </p>
    </div>
</footer>

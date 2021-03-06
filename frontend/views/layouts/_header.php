<header class="header-img">
    <div class="header-overlay"></div>
    <div class="header-phone"><img src="/images/phone32.png" alt=""><?= $siteContent->phones_header ?></div>
    <div class="header-panel">
        <div class="logo"><img src="/images/main/logo_64.png" alt=""><span>&nbsp;Светлоград</span></div>
        <nav class="nav-grid">
            <a href="/about">О компании</a>
            <!--            <a href="/">Оплата и доставка</a>-->
            <a href="/actions">Акции и скидки</a>
            <a href="/articles">Статьи</a>
            <a href="/contact">Вопросы</a>
            <a href="/catalog">Каталог</a>
            <?php if (Yii::$app->user->isGuest) { ?>
                <a href="/login">Вход</a>
            <?php } else { ?>
                <a href="/cabinet"><i class="fa fa-user"></i>&nbsp;<?= Yii::$app->user->identity->email ?></a>
                <a href="/site/logout">Выход</a>
            <?php } ?>
            <div id="searchcontainer">
                <form role="search" method="get" id="searchform" action="/search">
                    <label for="s" id="searchlabel">
                        <i class="fa fa-search"></i>
                    </label>
                    <input type="text" name="ProductTextSearch[text]" value="" placeholder="Поиск..." class="" id="s"/>
                </form>
            </div>
        </nav>
    </div>
    <?= $this->render('_top_catalog.php') ?>
</header>





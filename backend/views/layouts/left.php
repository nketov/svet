<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/admin/images/favicon-32x32.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Светлоград</p>

                <a href="#" style="display: none"><i class="fa fa-circle text-success" ></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form" style="display: none">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    ['label' => 'Содержание сайта', 'icon' => 'tv', 'url' => ['/content'],],
//                    ['label' => 'Содержание акций', 'icon' => 'gift', 'url' => ['/actions-content'],],
//                    ['label' => 'Курсы валют', 'icon' => 'money', 'url' => ['/currency'],],
//                    ['label' => 'Загрузка данных', 'icon' => 'upload', 'url' => ['/upload'],],
//                    ['label' => 'Загрузка изображений', 'icon' => 'upload', 'url' => ['/image-upload'],],
//                    ['label' => 'Акции', 'icon' => 'gift', 'url' => ['/actions'],],
//                    ['label' => 'Заказы', 'icon' => 'shopping-basket', 'url' => ['/order'],],
//                    ['label' => 'Клиенты', 'icon' => 'user', 'url' => ['/user'],],


//                    [
//                        'label' => 'Some tools',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
                ],
            ]
        ) ?>

    </section>

</aside>

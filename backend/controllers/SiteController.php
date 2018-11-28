<?php

namespace backend\controllers;

use app\models\UploadForm;
use backend\components\ShopUploader;
use common\models\Content;
use common\models\MainPage;
use yii\web\Response;
use yii\web\UploadedFile;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'content', 'upload', 'main-page'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {


        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->email == 'admin' && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionMainPage()
    {

        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', '300');

        $post = Yii::$app->request->post();
        if (Yii::$app->request->isAjax && $post) {
            \ Yii::$app->response->format = Response::FORMAT_JSON;
            $model = MainPage::findOne($post['key']);
            $model->product_id = $post['product'];
            $model->save();
            return $this->renderAjax('_main_img', [
                'product' => $model->product,
            ]);
        }

        $models = MainPage::find()->with(['product'])->all();


        return $this->render('main-page', compact('models'));

    }


    public function actionContent()
    {

        $model = Content::findOne(1);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('success', ['message' => '<div class="box"><div class="box-body">Данные успешно сохранены!</div></div>',
                'title' => 'Содержание сайта']);
        } else {
            return $this->render('content', compact(['model']));
        }
    }


    public function actionUpload()
    {


        $model = new UploadForm();

        if ($model->load(Yii::$app->request->post())) {

            $model->excelFile = UploadedFile::getInstance($model, 'excelFile');

            if ($model->upload()) {
                return ShopUploader::widget(['shop' => $model->shop, 'markup' => $model->markup]);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }


    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}

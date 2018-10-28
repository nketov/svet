<?php
namespace backend\controllers;

use app\models\UploadForm;
use backend\components\ShopUploader;
use common\models\Product;
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
                        'actions' => ['logout', 'content','upload'],
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
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionContent()
    {

            return $this->render('content');

    }



    public function actionUpload()
    {

        $model = new UploadForm();

        if (Yii::$app->request->isPost) {

            $model->excelFile = UploadedFile::getInstance($model, 'excelFile');
            $model->shop= $_POST['UploadForm']['shop'];

            if ($model->upload()) {
                $report = $this->excelUpload($model->shop);

                return $this->render('upload', ['message' => $report,
                    'title' => 'Отчёт о загрузке']);
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

    private function excelUpload($shop)
    {
        $report = '';
        switch ($shop) {
            case Product::SVET_SHOP:
                return ShopUploader::uploadSvet();
                break;

        }

      return $report;
    }
}

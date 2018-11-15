<?php

namespace frontend\controllers;

use frontend\models\Cart;
use Yii;
use common\models\Product;
use common\models\ProductSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ProductsController implements the CRUD actions for Product model.
 */
class ProductsController extends Controller
{



    public function actionCategory()
    {
        $searchModel = new ProductSearch();
        $searchModel->setAttribute('active', 1);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('category', compact('products', 'searchModel', 'dataProvider'));

    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionAjaxGetSession()
    {
        if(Yii::$app->request->isAjax) {
            \ Yii::$app->response->format = Response::FORMAT_JSON;
            $cart = new Cart;
            return $cart->getCart();
        }
    }



    public function actionAddCart()
    {
        $data=Yii::$app->request->post('data');
        $qty=Yii::$app->request->post('qty');

        if (empty($this->findModel($data['id']))) return false;

        $session=Yii::$app->session;
        $session->open();
        $cart= new Cart;
        $cart->addCart($data,$qty);

        return  true;
    }

    public function actionResetCart()
    {
        $cart= new Cart;
        $cart->resetCart();
        $this->redirect(Url::to(['/']));
    }

    public function actionDeleteCart($id)
    {
        $cart= new Cart;
        $cart->deleteCart($id);
    }



    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

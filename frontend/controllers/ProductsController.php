<?php

namespace frontend\controllers;

use common\models\Order;
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

    public function actionOrder()
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('warning', 'Залогиньтесь для оформления заказа');
            return $this->redirect(Url::to(['/login']));
        }

        $cart=new Cart();

        $order=new Order();
        $order->user_id= Yii::$app->user->id;
        $order->summ = $cart->getSumm();
        $products = $cart->getCart();
        $order_content = '';
        $count=1;
        foreach ($products as $id=>$array) {
            $product = $this->findModel($id);
            $order_content .= '<p>'.$count.'. '.$product->name. ' ('.$product->code.') '. $array['qty']. ' шт.  - '. round($product->getDiscountPrice() * $array['qty'], 2) . ' ' . $currencySign . ' </p>';
            $count++;
        }
        $order_content .= '<p><b> Всего: '.round($cart->getSumm() , 2) . ' грн</b></p>';
        $order->order_content = $order_content;
        $order->save();

        $user_text= '<p>Вы сделали заказ на сайте <b>svitlograd.in.ua</b>. Содержание заказа : </p>'.$order_content;
        mail(Yii::$app->user->identity->email, 'Заказ № '. $order->id, $user_text,"Content-type:text/html;charset=UTF-8");

        $shop_text= '<p>Пользователь  <b>'.Yii::$app->user->identity->email.'</b> сделал заказ. Содержание заказа : </p>'.$order_content;
        mail('ketovnv@gmail.com', 'Заказ № '. $order->id , $shop_text ,"Content-type:text/html;charset=UTF-8");

        $cart->resetCart();
        Yii::$app->session->setFlash('success', 'Ваш заказ отправлен!');
        $this->redirect(Url::to(['/']));

    }



    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php
namespace frontend\models;

use common\models\Product;
use yii\base\Model;

class Cart extends Model{

    public function addCart(Product $product, $qty=1){

       
        if(isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        } else{
            $_SESSION['cart'][$product->id] = [
               'qty' => $qty] ;
        }
        
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty'] )? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum'] )? $_SESSION['cart.sum'] + $qty *$product->getDiscountPrice() : $qty *$product->getDiscountPrice();

       }

    public function resetCart(){
        $_SESSION['cart'] = [];
        $_SESSION['cart.qty'] = 0;
        $_SESSION['cart.sum']=0;
    }

    public function deleteCart($id){
        if($product = Product::findOne($id)){
            $_SESSION['cart.qty'] -=$_SESSION['cart'][$id]['qty'];
            $_SESSION['cart.sum']  -= $_SESSION['cart'][$id]['qty'] *$product->getDiscountPrice();
            unset($_SESSION['cart'][$id]);
        }
    }

    public function getSumm(){
        return isset($_SESSION['cart.sum'])? $_SESSION['cart.sum'] :0;
    }

    public function getQuantity(){
        return isset($_SESSION['cart']) ? sizeof($_SESSION['cart']):0;
    }

    public function getProducts(){
        return isset($_SESSION['cart']) ? $_SESSION['cart']:[];
    }


}



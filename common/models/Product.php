<?php
namespace common\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public $material;
    public $price;



    public function rules()
    {
        return [
            [['material','price'], 'safe'],
        ];
    }

}

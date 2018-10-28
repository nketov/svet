<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $code
 * @property int $shop
 * @property int $active
 * @property int $category
 * @property string $name
 * @property string $price
 * @property string $description
 * @property string $image_1
 * @property string $image_2
 * @property string $image_3
 * @property string $image_4
 * @property string $image_5
 * @property string $color
 * @property int $height
 * @property int $diameter
 * @property int $width
 * @property int $depth
 * @property string $lamps
 * @property string $second_code
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }


    const SVET_SHOP  = '0';
    const EGLO_SHOP  = '1';
    const FREYA_SHOP  = '2';
    const MAYTONY_SHOP  = '3';


     private static $_shopName = [
        self::SVET_SHOP   => 'Светлоград',
        self::EGLO_SHOP => 'ЕГЛО',
        self::FREYA_SHOP    => 'Freya',
        self::MAYTONY_SHOP        => 'Maytoni',
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shop', 'active', 'category', 'height', 'diameter', 'width', 'depth'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['code', 'second_code'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 200],
            [['image_1', 'image_2', 'image_3', 'image_4', 'image_5'], 'string', 'max' => 55],
            [['color', 'material'], 'string', 'max' => 75],
            [['lamps'], 'string', 'max' => 100],
            [['code'], 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'shop' => 'Shop',
            'active' => 'Active',
            'category' => 'Category',
            'name' => 'Name',
            'price' => 'Price',
            'description' => 'Description',
            'image_1' => 'Фото 1',
            'image_2' => 'Фото 2',
            'image_3' => 'Фото 3',
            'image_4' => 'Фото 4',
            'image_5' => 'Фото 5',
            'color' => 'Цвет',
            'material' => 'Материал',
            'height' => 'Высота',
            'diameter' => 'Diameter',
            'width' => 'Ширина',
            'depth' => 'Depth',
            'lamps' => 'Lamps',
            'second_code' => 'Second Code',
        ];
    }

    public static function shopName($shop)
    {
        return self::$_shopName[$shop];
    }

    /**
     * {@inheritdoc}
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}

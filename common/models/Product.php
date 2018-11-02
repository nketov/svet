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
 * @property string $description *
 * @property string $image_1
 * @property string $image_2
 * @property string $image_3
 * @property string $image_4
 * @property string $image_5
 * @property int $images_count
 * @property string $color
 * @property int $height
 * @property int $diametr
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

    const SVET_SHOP = '0';
    const EGLO_SHOP = '1';
    const FREYA_SHOP = '2';
    const MAYTONI_SHOP = '3';


    const CATEGORY_OTHER = '0';
    const CATEGORY_LUSTER = '1';
    const CATEGORY_WALL_LAMP = '2';
    const CATEGORY_TABLE_LAMP = '3';
    const CATEGORY_MOUNT_LAMP = '4';
    const CATEGORY_FLOOR_LAMP = '5';
    const CATEGORY_SPOOT_LIGHT = '6';


    private static $_shopName = [
        self::SVET_SHOP => 'Светлоград',
        self::EGLO_SHOP => 'ЕГЛО',
        self::FREYA_SHOP => 'Freya',
        self::MAYTONI_SHOP => 'Maytoni',
    ];

    private static $_categoryName = [
        self::CATEGORY_OTHER => 'Другое',
        self::CATEGORY_LUSTER => 'Люстры',
        self::CATEGORY_WALL_LAMP => 'Бра и настенные светильники',
        self::CATEGORY_TABLE_LAMP => 'Настольные лампы',
        self::CATEGORY_MOUNT_LAMP => 'Подвесы',
        self::CATEGORY_FLOOR_LAMP => 'Торшеры',
        self::CATEGORY_SPOOT_LIGHT => 'Точечные светильники',
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shop', 'active', 'category', 'height', 'diametr', 'width', 'depth', 'images_count'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['code', 'second_code'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 200],
            [['image_1', 'image_2', 'image_3', 'image_4', 'image_5'], 'string', 'max' => 55],
            [['color', 'material'], 'string', 'max' => 75],
            [['lamps'], 'string', 'max' => 100],
            [['code'], 'unique'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код товара',
            'shop' => 'Магазин',
            'active' => 'Состояние',
            'category' => 'Категория',
            'name' => 'Наименование',
            'price' => 'Цена',
            'description' => 'Описание',
            'images_count' => 'Фотографии',
            'image_1' => 'Фото 1',
            'image_2' => 'Фото 2',
            'image_3' => 'Фото 3',
            'image_4' => 'Фото 4',
            'image_5' => 'Фото 5',
            'color' => 'Цвет',
            'material' => 'Материал',
            'height' => 'Высота, мм',
            'diametr' => 'Диаметр, мм',
            'width' => 'Ширина, мм',
            'depth' => 'Глубина, мм',
            'lamps' => 'Лампочки',
            'second_code' => 'Запасной код',
        ];
    }

    public static function shopName($shop)
    {
        return self::$_shopName[$shop];
    }

    public static function shopNamesList()
    {
        return self::$_shopName;
    }

    public static function categoryNamesList()
    {
        return self::$_categoryName;
    }

    public static function categoryName($category)
    {
        return self::$_categoryName[$category];
    }

    public static function getStatuses()
    {
        return [
            0 => 'Отключён',
            1 => 'Активный',
        ];
    }


    public function getImages()
    {
        $images = [];
        for ($i = 1; $i < 6; $i++) {
            $k = 'image_' . $i;
            if (!empty($this->$k)) {
                $images[$k] = $this->$k;
            }
        }
        return $images;
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->images_count = sizeof($this->getImages());
            return true;
        }
        return false;
    }


    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}

<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Color;

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
 * @property string $size
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
    const ARTGLASS_SHOP = '4';


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
        self::ARTGLASS_SHOP => 'ARTGLASS',
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

    private static $_materialName = [
        '1' => 'Дерево',
        '2' => 'Сталь, дерево',
        '3' => 'Керамика',
        '4' => 'Латунь',
        '5' => 'Алюминий',
        '6' => 'Сталь, керамика',
        '7' => 'Металл, стекло',
        '8' => 'Пластик с эффектом хрусталя',
        '9' => 'Сталь, стекло',
        '10' => 'Стекло',
        '11' => 'Сталь, зеркало',
        '12' => 'Сталь',
        '13' => 'Ткань',
        '14' => 'Пластик',
        '15' => 'Стекло, хрусталь',
        '16' => 'Ткань, хрусталь',
        '17' => 'Пластик, хрусталь',
        '18' => 'Сталь, бетон',
        '19' => 'Сталь, пластик',
        '20' => 'Стекло с эффектом потертости',
        '21' => 'Бетон, дерево',
        '22' => 'Ткань лён, пластик',
        '23' => 'Сталь, бетон, дерево',
        '24' => 'Ткань лён',
        '25' => 'Фольга',
        '26' => 'Нержавеющая сталь',
        '27' => 'Ткань, стекло',
        '28' => 'Дерево, стекло',
        '29' => 'Алюминий, пластик',
        '30' => 'Сталь, алюминий',
        '31' => 'Хрусталь',
        '32' => 'Сталь, хрусталь',
        '33' => 'Стекло, алюминий',
        '34' => 'Стекло, сталь, хрусталь',
        '35' => 'Сталь, алюминий, хрусталь',
        '36' => 'Матовое стекло, зеркало',
        '37' => 'Пластик с эффектом хрусталя',
        '38' => 'Ткань, фольга, пластик',
        '39' => 'Алюминий, сталь',
        '40' => 'Ткань, пластик',
        '41' => 'Ткань, пластик, стекло',

    ];

    private static $_linksPattern = [


        self::SVET_SHOP => 'https://drive.google.com/file/d/1FEJTPIO8xEY6tY8nY1B2uTqnxId7X6JB/view?usp=sharing',
        self::EGLO_SHOP => 'https://drive.google.com/file/d/1B0TAQ8ruOF7e1YrPW7wmg_m7CusoZ3W_/view?usp=sharing - EGLO',
        self::FREYA_SHOP => 'https://drive.google.com/file/d/1m86Zb4irTz_GEfcrEc-crltWVyvINQQX/view?usp=sharing',
        self::MAYTONI_SHOP => 'https://drive.google.com/file/d/1f386IZZ4WFIQplpfFVEiSIgVY_Thg71M/view?usp=sharing',
        self::ARTGLASS_SHOP => 'https://drive.google.com/file/d/1gU4IolT7YQUxrx3hPXTvigSmAXZAwMGh/view?usp=sharing',

    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shop', 'active', 'category', 'height', 'diametr', 'width', 'depth', 'length','images_count','color', 'material','color_base', 'material_base', 'collection'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['code', 'second_code'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 200],
            [['image_1', 'image_2', 'image_3', 'image_4', 'image_5'], 'string', 'max' => 55],
            [['lamps', 'size'], 'string', 'max' => 100],
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
            'collection' => 'Коллекция',
            'price' => 'Цена',
            'description' => 'Описание',
            'images_count' => 'Фотографии',
            'image_1' => 'Фото 1',
            'image_2' => 'Фото 2',
            'image_3' => 'Фото 3',
            'image_4' => 'Фото 4',
            'image_5' => 'Фото 5',
            'color' => 'Цвет абажура',
            'color_base' => 'Цвет основания',
            'material' => 'Материал абажура',
            'material_base' => 'Материал основания',
            'height' => 'Высота, мм',
            'diametr' => 'Диаметр, мм',
            'width' => 'Ширина, мм',
            'depth' => 'Глубина, мм',
            'length' => 'Длина, мм',
            'size' => 'Размер',
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

    public static function materialsNamesList()
    {
        $array =  self::$_materialName;
        asort($array);
        return $array;
    }

    public static function linksPatternList()
    {
        return self::$_linksPattern;
    }

    public static function materialName($material_id)
    {
        return self::$_materialName[$material_id];
    }

    public static function colorsNamesList()
    {
        return ArrayHelper::map(Color::find()->all(),'id','name');
    }

    public static function colorName($color_id)
    {
        return self::colorsNamesList()[$color_id];
    }

    public static function collectionsNamesList()
    {
        return ArrayHelper::map(Collection::find()->all(),'id','name');
    }

    public static function collectionName($collection_id)
    {
        return self::collectionsNamesList()[$collection_id];
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

    public function getFirstImage()    {

        return array_shift($this->getImages());
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->images_count = sizeof($this->getImages());
            return true;
        }
        return false;
    }

    public  function getDiscountPrice()
    {
        $discounts = \Yii::$app->user->identity->actions ?? [];

        if(array_key_exists($this->id, $discounts)) {
            return round($this->price *(100-$discounts[$this->id])/100, 2);
        }

        if(array_key_exists('', $discounts)) {
            return round($this->price *(100-$discounts[''])/100, 2);
        }

        return $this->price;
    }


    public static function maxPrice($query)
    {
        $model = $query->andFilterWhere(['>','price',0])->orderBy('price DESC')->one();
        if(empty($model)) return 1;

        return ceil($model->price);
    }

    public static function minPrice($query)
    {
        $model = $query->andFilterWhere(['>','price',0])->orderBy('price ASC')->one();
        if(empty($model)) return 1;
        return floor($model->price);
    }


    public static function getActiveCodesArray()
    {
        return ArrayHelper::map(self::find()->active()->all(),'id','code');
    }

    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}

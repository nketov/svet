<?php

namespace app\models;

use common\models\Product;
use yii\base\Model;
use yii\helpers\Url;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $excelFile;
    public $shop;

    public function rules()
    {
        return [
            [['excelFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xls', 'checkExtensionByMimeType' => false],
            [['shop'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'shop' => 'Магазин',
            'excelFile' => 'Фаил Excel (.xls)'
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->excelFile->saveAs('uploads/prices/'.Product::shopName($this->shop) . '.xls', false);
            return true;
        } else {
            return false;
        }
    }
}
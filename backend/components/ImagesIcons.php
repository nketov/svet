<?php

namespace backend\components;

use yii\base\Widget;
use yii\bootstrap\Html;


class ImagesIcons extends Widget
{

    public $images;
    public $product_edit;

    public function run()
    {
        $render = '';
        foreach ($this->images as $key => $img) {
            $render .= '<img data-key="' . $key . '"  data-product="' . $this->product_edit . '" class="image_icon " src="/images/products/' . $img . '"/>';
        }

        if ($this->product_edit) {
            if (sizeof($this->images) < 5) {
                $render .= '<div><img data-key="0"  data-product="' . $this->product_edit . '" class="image_icon image_empty" src="/admin/images/background.png"/>';
                $render .= Html::submitButton('Добавить фото', ['class' => 'btn btn-lg btn-purple btn-add-image',
                        'data-key' => '0',
                        'data-product' => $this->product_edit
                    ]) . '</div>';
            }
        }

        return $render;

    }
}
<?php

namespace backend\components;

use yii\base\Widget;


class ImagesIcons extends Widget
{

    public $images;
    public $product_edit;

    public function run()
    {
        $render = '';
        foreach ($this->images as $img) {
            $render .= '<img class="image_icon" src="/images/products/' . $img . '"/>';
        }

        if ($this->product_edit) {
            if(sizeof($this->images)<5) {
                $render .= '<img class="image_icon" src="/admin/images/background.png"/>';
            }
        }

        return $render;

    }
}
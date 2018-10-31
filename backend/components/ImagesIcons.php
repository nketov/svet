<?php

namespace backend\components;

use yii\base\Widget;


class ImagesIcons extends Widget
{

    public $images;

    public function run()
    {
        $render='';
        foreach ($this->images as $img) {
            $render .='<img class="image_icon" src="/images/products/'.$img .'"/>';
        }
        return $render;
    }
}
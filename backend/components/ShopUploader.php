<?php

namespace backend\components;

use common\models\Product;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use yii\helpers\Url;

class ShopUploader
{

    public static function uploadSvet()
    {

        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', '300');

        $inputFileName = Url::to('@backend/web/uploads/prices/') . Product::shopName(Product::SVET_SHOP) . '.xls';
        $reader = new Xls();
        $reader->setReadDataOnly(true);


// Freya
//$reader->setReadFilter(new XlsFilter(6, ['A','B','C','D','E','I','J','K','L','M','N']));
// Eglo
//$reader->setReadFilter(new XlsFilter(2, ['A','B','C']));

// Maytoni
//$reader->setReadFilter(new XlsFilter(6, ['A','B','C','D','H','I','J','K','L','M']));

// Svet
        $reader->setReadFilter(new XlsFilter(9, ['A', 'E', 'H']));

        try {
            $spreadsheet = $reader->load($inputFileName);

        } catch (Exception $e) {
            exit('Error loading file: ' . $e->getMessage());
        }

        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

//var_dump($sheetData);

        $rows = [];
        foreach ($sheetData as $row) {

            if (!empty($row['H']) && !empty($row['A'])) {
                $rows[(string)trim($row['H'])] = [
                    'name' => (string)trim($row['A']),
                    'second_code' => (string)trim($row['E'])
                ];

            }

        }

        $new_count = 0;
        $updated_count = 0;
        $activated_count = 0;
        $deactivated_count = 0;

        $products = Product::find()->shop(Product::SVET_SHOP)->all();

        foreach ($products as $product) {

            if (array_key_exists($product->code, $rows)) {
                if ($product->active) {
                    $updated_count++;
                } else {
                    $activated_count++;
                    $product->active = 1;
                }

                $product->name = $rows[$product->code]['name'];
                $product->shop = Product::SVET_SHOP;
                $product->second_code = $rows[$product->code]['second_code'];


            } else {
                if ($product->active) {
                    $product->active = 0;
                    $deactivated_count++;
                }
            }

            if ($product->save()) {
                unset($rows[$product->code]);
            } else {
                var_dump($product->errors);
                var_dump($product);
                exit();
            }
        }

        foreach ($rows as $code => $row) {

            $newProduct = new Product();
            $newProduct->code = (string)$code;
            $newProduct->name = (string)$row['name'];
            $newProduct->shop = Product::SVET_SHOP;
            $newProduct->second_code = (string)$row['second_code'];

            if ($newProduct->save()) {
                $new_count++;
            } else {
                var_dump($newProduct->errors);
                var_dump($newProduct);
                exit();
            }

        }

        $report = '<div class="upload-report">
            <h3 style="color: green;"> Прайс магазина &laquo;<span>' . Product::shopName(Product::SVET_SHOP) . '</span>&raquo; успешно загружен : </h3>
            <div>Обновлено <span >' . $updated_count . '</span> активных продуктов</div>
            <div>Добавлено новых <span>' . $new_count . '</span> продуктов</div>
            <div>Деактивировано <span >' . $deactivated_count . '</span> активных продуктов</div>
            <div>Активировано и обновлено <span>' . $activated_count . '</span> неактивных продуктов</div>
            </div>';


        return $report;;
    }


}
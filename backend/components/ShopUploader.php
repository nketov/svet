<?php

namespace backend\components;

use common\models\Product;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use yii\helpers\Url;

class ShopUploader
{

    private $shop;
    private $sheetData;


    public function __construct($shop)
    {
        $this->shop = $shop;
        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', '300');

        $inputFileName = Url::to('@backend/web/uploads/prices/') . Product::shopName($shop) . '.xls';
        $reader = new Xls();
        $reader->setReadDataOnly(true);
        $reader->setReadFilter($this->getFilter());


        try {
            $spreadsheet = $reader->load($inputFileName);

        } catch (Exception $e) {
            exit('Error loading file: ' . $e->getMessage());
        }

        $this->sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);


    }

    public function upload()
    {
        switch ($this->shop) {
            case Product::SVET_SHOP:
                return $this->uploadSvet();
                break;
        }

    }

    private function uploadSvet()
    {

        $rows = [];
        foreach ($this->sheetData as $row) {
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

        return $this->renderReport($updated_count, $new_count, $deactivated_count, $activated_count);
    }



    private function getFilter()

    {
        switch ($this->shop) {
            case Product::SVET_SHOP:
                return new XlsFilter(9, ['A', 'E', 'H']);
                break;

            case Product::EGLO_SHOP:
                return new XlsFilter(2, ['A', 'B', 'C']);
                break;

            case Product::FREYA_SHOP:
                return new XlsFilter(6, ['A', 'B', 'C', 'D', 'E', 'I', 'J', 'K', 'L', 'M', 'N']);
                break;

            case Product::MAYTONY_SHOP:
                return new XlsFilter(6, ['A', 'B', 'C', 'D', 'H', 'I', 'J', 'K', 'L', 'M']);
                break;
        }

    }

    private function renderReport($updated_count, $new_count, $deactivated_count, $activated_count)
    {
        $report = '<div class="upload-report">
            <h3 style="color: green;"> Прайс магазина &laquo;<span>' . Product::shopName(Product::SVET_SHOP) . '</span>&raquo; успешно загружен : </h3>
            <div> &nbsp;&nbsp;Обновлено <span >' . $updated_count . '</span> активных продуктов</div>
            <div> &nbsp;&nbsp;Добавлено новых <span>' . $new_count . '</span> продуктов</div>
            <div> &nbsp;&nbsp;Деактивировано <span >' . $deactivated_count . '</span> активных продуктов</div>
            <div> &nbsp;&nbsp;Активировано и обновлено <span>' . $activated_count . '</span> неактивных продуктов</div>
            </div>';

        return $report;

    }


}
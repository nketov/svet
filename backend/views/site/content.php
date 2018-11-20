<?php

use yii\helpers\Url;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
?>

<h1 style="text-align: center;">Админка</h1>


<?php
ini_set('memory_limit', '256M');
ini_set('max_execution_time', '300');

$inputFileName = Url::to('@backend/web/uploads/colors.xlsx');
$reader = new Xlsx();
$reader->setReadDataOnly(true);

var_dump($reader);
try {
    $spreadsheet = $reader->load($inputFileName);

} catch (Exception $e) {
    exit('Error loading file: ' . $e->getMessage());
}


$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

array_shift($sheetData);
array_shift($sheetData);
$array=[];

foreach ($sheetData as $row) {
    $array[]=trim($row['C']);
}

$result=array_unique($array);
asort($result);


?>






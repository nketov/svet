<?php


use backend\components\XlsFilter;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use yii\helpers\Url;

?>

    <h1 style="text-align: center;">Админка</h1>

<?php


$inputFileName = Url::to('@backend/web/uploads/prices/') . 'Svet.xls';
$reader = new Xls();
$reader->setReadDataOnly(true);

ini_set('memory_limit', '256M');
ini_set('max_execution_time', '300');

// Freya
//$reader->setReadFilter(new XlsFilter(6, ['A','B','C','D','E','I','J','K','L','M','N']));
// Eglo
//$reader->setReadFilter(new XlsFilter(2, ['A','B','C']));

// Maytoni
//$reader->setReadFilter(new XlsFilter(6, ['A','B','C','D','H','I','J','K','L','M']));

// Svet
$reader->setReadFilter(new XlsFilter(10, ['A','D']));

try {
   $spreadsheet = $reader->load($inputFileName);

} catch (Exception $e) {
    exit('Error loading file: ' . $e->getMessage());
}

$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

var_dump($sheetData);

?>
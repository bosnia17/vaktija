<?php

require __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$file = __DIR__ . '/takvim_2026.xlsx';

$spreadsheet = IOFactory::load($file);
$sheet = $spreadsheet->getActiveSheet();

function cellValue($sheet, $cell)
{
    return trim((string)$sheet->getCell($cell)->getValue());
}

function formatVrijeme($value, &$zadnjiSat)
{
    $value = trim((string)$value);

    if ($value === '') {
        return '';
    }

    $value = preg_replace('/[^0-9]/', '', $value);

    if ($value === '') {
        return '';
    }

    // npr. 537 -> 05:37
    if (strlen($value) == 3) {
        $sat = (int)substr($value, 0, 1);
        $min = (int)substr($value, 1, 2);
        $zadnjiSat = $sat;
    }

    // npr. 1151 -> 11:51, 1800 -> 18:00
    elseif (strlen($value) == 4) {
        $sat = (int)substr($value, 0, 2);
        $min = (int)substr($value, 2, 2);
        $zadnjiSat = $sat;
    }

    // npr. 37 -> koristi prethodni sat
    elseif (strlen($value) <= 2) {
        if ($zadnjiSat === null) {
            return '';
        }

        $sat = $zadnjiSat;
        $min = (int)$value;
    }

    else {
        return '';
    }

    return sprintf('%02d:%02d', $sat, $min);
}

$zadnjiSat = [
    'zora' => null,
    'izlazak' => null,
    'podne' => null,
    'ikindija' => null,
    'aksam' => null,
    'jacija' => null,
    'kibla' => null,
];

echo "<pre>";

for ($row = 5; $row <= $sheet->getHighestRow(); $row++) {

    $danKalendara = cellValue($sheet, "A$row");

    if ($danKalendara === '' || !is_numeric($danKalendara)) {
        continue;
    }

    $datum = "2026-01-" . str_pad($danKalendara, 2, '0', STR_PAD_LEFT);

    $danSedmice = cellValue($sheet, "B$row");
    $danTakvim  = cellValue($sheet, "C$row");
    $opis       = cellValue($sheet, "D$row");

    $zora          = formatVrijeme(cellValue($sheet, "E$row"), $zadnjiSat['zora']);
    $izlazakSunca  = formatVrijeme(cellValue($sheet, "F$row"), $zadnjiSat['izlazak']);
    $podne         = formatVrijeme(cellValue($sheet, "G$row"), $zadnjiSat['podne']);
    $ikindija      = formatVrijeme(cellValue($sheet, "H$row"), $zadnjiSat['ikindija']);
    $aksam         = formatVrijeme(cellValue($sheet, "I$row"), $zadnjiSat['aksam']);
    $jacija        = formatVrijeme(cellValue($sheet, "J$row"), $zadnjiSat['jacija']);
    $kiblaSat      = formatVrijeme(cellValue($sheet, "K$row"), $zadnjiSat['kibla']);

    echo "Datum: $datum\n";
    echo "Dan: $danSedmice\n";
    echo "Takvim: $danTakvim\n";
    echo "Opis: $opis\n";
    echo "Zora: $zora\n";
    echo "Izlazak: $izlazakSunca\n";
    echo "Podne: $podne\n";
    echo "Ikindija: $ikindija\n";
    echo "Akšam: $aksam\n";
    echo "Jacija: $jacija\n";
    echo "Kibla sat: $kiblaSat\n";
    echo "-----------------------------\n";
}

echo "</pre>";
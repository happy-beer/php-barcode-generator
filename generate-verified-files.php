<?php

require_once ('vendor/autoload.php');

$generatorSVG = new \Happybeer\Barcode\BarcodeGeneratorSVG(\Happybeer\Barcode\BarcodeAllowTypes::TYPE_EAN_13);
file_put_contents('tests/verified-files/081231723897-ean13.svg', $generatorSVG->getBarcode('081231723897'));

$generatorHTML = new Happybeer\Barcode\BarcodeGeneratorHTML(\Happybeer\Barcode\BarcodeAllowTypes::TYPE_CODE_128);
file_put_contents('tests/verified-files/081231723897-code128.html', $generatorHTML->getBarcode('081231723897'));

$generatorSVG = new Happybeer\Barcode\BarcodeGeneratorSVG(\Happybeer\Barcode\BarcodeAllowTypes::TYPE_EAN_13);
file_put_contents('tests/verified-files/0049000004632-ean13.svg', $generatorSVG->getBarcode('0049000004632'));

echo 'finish'.PHP_EOL;
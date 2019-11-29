<?php


namespace Happybeer\Barcode\Generators\EanUpc;

class ThirteenGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, 13);
    }
}
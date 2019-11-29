<?php


namespace Happybeer\Barcode\Generators\EanUpc;

class EightGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, 8);
    }
}
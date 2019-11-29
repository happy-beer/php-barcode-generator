<?php


namespace Happybeer\Barcode\Generators\EanExt;

class FiveGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, 5);
    }
}
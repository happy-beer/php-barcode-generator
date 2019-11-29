<?php


namespace Happybeer\Barcode\Generators\EanUpc;

class SixGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, 6);
    }
}
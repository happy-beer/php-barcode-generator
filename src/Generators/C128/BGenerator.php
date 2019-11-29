<?php


namespace Happybeer\Barcode\Generators\C128;

class BGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, 'B');
    }
}
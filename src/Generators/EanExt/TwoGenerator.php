<?php


namespace Happybeer\Barcode\Generators\EanExt;

class TwoGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, 2);
    }
}
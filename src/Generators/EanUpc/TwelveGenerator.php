<?php


namespace Happybeer\Barcode\Generators\EanUpc;

class TwelveGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, 12);
    }
}
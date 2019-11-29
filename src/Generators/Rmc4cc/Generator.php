<?php


namespace Happybeer\Barcode\Generators\Rmc4cc;


class Generator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, false);
    }
}
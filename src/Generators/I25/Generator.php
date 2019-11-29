<?php


namespace Happybeer\Barcode\Generators\I25;

class Generator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, false);
    }
}
<?php


namespace Happybeer\Barcode\Generators\I25;

class CheckSumGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, true);
    }
}
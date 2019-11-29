<?php


namespace Happybeer\Barcode\Generators\Msi;

class CheckSumGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, true);
    }
}
<?php


namespace Happybeer\Barcode\Generators\S25;

class CheckSumGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, true);
    }
}
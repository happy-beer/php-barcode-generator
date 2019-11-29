<?php


namespace Happybeer\Barcode\Generators\S25;

class CheckSumGenerator extends S25GeneralBarcodeGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, true);
    }
}
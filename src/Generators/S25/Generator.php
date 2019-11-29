<?php


namespace Happybeer\Barcode\Generators\S25;

class Generator extends S25GeneralBarcodeGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, false);
    }
}
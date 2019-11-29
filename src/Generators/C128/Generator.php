<?php


namespace Happybeer\Barcode\Generators\C128;


class Generator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, '');
    }
}
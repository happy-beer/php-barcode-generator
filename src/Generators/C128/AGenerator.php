<?php


namespace Happybeer\Barcode\Generators\C128;


class AGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, 'A');
    }
}
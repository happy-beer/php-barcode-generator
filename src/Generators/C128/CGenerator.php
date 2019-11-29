<?php


namespace Happybeer\Barcode\Generators\C128;


class CGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, 'C');
    }
}
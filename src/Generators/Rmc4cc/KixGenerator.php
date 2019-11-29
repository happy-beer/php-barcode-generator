<?php


namespace Happybeer\Barcode\Generators\Rmc4cc;


class KixGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, true);
    }
}
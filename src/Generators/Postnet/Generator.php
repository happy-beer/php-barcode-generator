<?php


namespace Happybeer\Barcode\Generators\Postnet;


class Generator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code);
    }
}
<?php


namespace Happybeer\Barcode\Generators\Postnet;


class PlanetGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, true);
    }
}
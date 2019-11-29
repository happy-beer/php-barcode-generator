<?php

namespace Happybeer\Barcode\Generators\Msi;

class Generator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, false);
    }
}
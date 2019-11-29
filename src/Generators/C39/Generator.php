<?php

namespace Happybeer\Barcode\Generators\C39;

class Generator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, false, false);
    }
}
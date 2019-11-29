<?php

namespace Happybeer\Barcode\Generators\C39;

class ExtGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, true, false);
    }
}
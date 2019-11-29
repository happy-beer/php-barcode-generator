<?php

namespace Happybeer\Barcode\Generators\C39;

class ExtCheckSumGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, true, true);
    }
}
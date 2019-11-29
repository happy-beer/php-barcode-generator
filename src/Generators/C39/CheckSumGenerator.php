<?php

namespace Happybeer\Barcode\Generators\C39;

class CheckSumGenerator extends GeneralGenerator
{
    function barcode($code)
    {
        return $this->barcodeGeneral($code, false, true);
    }
}
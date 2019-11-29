<?php

/**
 * General PHP Barcode Generator
 *
 * @author Casper Bakker - picqer.com
 * Based on TCPDF Barcode Generator
 */

// Copyright (C) 2002-2015 Nicola Asuni - Tecnick.com LTD
//
// This file is part of TCPDF software library.
//
// TCPDF is free software: you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// TCPDF is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// You should have received a copy of the License
// along with TCPDF. If not, see
// <http://www.tecnick.com/pagefiles/tcpdf/LICENSE.TXT>.
//
// See LICENSE.TXT file for more information.

namespace Happybeer\Barcode;

use Happybeer\Barcode\Generators;

abstract class BarcodeGenerator
{
    protected $generator;

    public function __construct($type)
    {
        $this->generator = Factory::getGenerator($type);
    }

    /**
     * Get the barcode data
     *
     * @param string $code code to print
     * @param string $type type of barcode
     * @return array barcode array
     * @public
     */
    protected function getBarcodeData($code)
    {
        $arrcode = $this->generator->barcode($code);

        if ( ! isset($arrcode['maxWidth'])) {
            $arrcode = $this->convertBarcodeArrayToNewStyle($arrcode);
        }

        return $arrcode;
    }

    protected function convertBarcodeArrayToNewStyle($oldBarcodeArray)
    {
        $newBarcodeArray = [];
        $newBarcodeArray['code'] = $oldBarcodeArray['code'];
        $newBarcodeArray['maxWidth'] = $oldBarcodeArray['maxw'];
        $newBarcodeArray['maxHeight'] = $oldBarcodeArray['maxh'];
        $newBarcodeArray['bars'] = [];
        foreach ($oldBarcodeArray['bcode'] as $oldbar) {
            $newBar = [];
            $newBar['width'] = $oldbar['w'];
            $newBar['height'] = $oldbar['h'];
            $newBar['positionVertical'] = $oldbar['p'];
            $newBar['drawBar'] = $oldbar['t'];
            $newBar['drawSpacing'] = ! $oldbar['t'];

            $newBarcodeArray['bars'][] = $newBar;
        }

        return $newBarcodeArray;
    }
}

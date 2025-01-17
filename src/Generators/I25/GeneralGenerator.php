<?php


namespace Happybeer\Barcode\Generators\I25;


use Happybeer\Barcode\Exceptions\InvalidCharacterException;
use Happybeer\Barcode\Generators;

abstract  class GeneralGenerator extends Generators\GeneratorGeneral
{

    /**
     * Interleaved 2 of 5 barcodes.
     * Compact numeric code, widely used in industry, air cargo
     * Contains digits (0 to 9) and encodes the data in the width of both bars and spaces.
     *
     * @param $code (string) code to represent.
     * @param $checksum (boolean) if true add a checksum to the code
     * @return array barcode representation.
     * @protected
     */
    protected function barcodeGeneral($code, $checksum = false)
    {
        $chr['0'] = '11221';
        $chr['1'] = '21112';
        $chr['2'] = '12112';
        $chr['3'] = '22111';
        $chr['4'] = '11212';
        $chr['5'] = '21211';
        $chr['6'] = '12211';
        $chr['7'] = '11122';
        $chr['8'] = '21121';
        $chr['9'] = '12121';
        $chr['A'] = '11';
        $chr['Z'] = '21';
        if ($checksum) {
            // add checksum
            $code .= $this->checksum($code);
        }
        if ((strlen($code) % 2) != 0) {
            // add leading zero if code-length is odd
            $code = '0' . $code;
        }
        // add start and stop codes
        $code = 'AA' . strtolower($code) . 'ZA';

        $bararray = array('code' => $code, 'maxw' => 0, 'maxh' => 1, 'bcode' => array());
        $k = 0;
        $clen = strlen($code);
        for ($i = 0; $i < $clen; $i = ($i + 2)) {
            $char_bar = $code{$i};
            $char_space = $code{$i + 1};
            if ( ! isset($chr[$char_bar]) || ! isset($chr[$char_space])) {
                throw new InvalidCharacterException();
            }
            // create a bar-space sequence
            $seq = '';
            $chrlen = strlen($chr[$char_bar]);
            for ($s = 0; $s < $chrlen; $s++) {
                $seq .= $chr[$char_bar]{$s} . $chr[$char_space]{$s};
            }
            $seqlen = strlen($seq);
            for ($j = 0; $j < $seqlen; ++$j) {
                if (($j % 2) == 0) {
                    $t = true; // bar
                } else {
                    $t = false; // space
                }
                $w = $seq{$j};
                $bararray['bcode'][$k] = array('t' => $t, 'w' => $w, 'h' => 1, 'p' => 0);
                $bararray['maxw'] += $w;
                ++$k;
            }
        }

        return $bararray;
    }


    /**
     * Checksum for standard 2 of 5 barcodes.
     *
     * @param $code (string) code to process.
     * @return int checksum.
     * @protected
     */
    protected function checksum($code)
    {
        $len = strlen($code);
        $sum = 0;
        for ($i = 0; $i < $len; $i += 2) {
            $sum += $code{$i};
        }
        $sum *= 3;
        for ($i = 1; $i < $len; $i += 2) {
            $sum += ($code{$i});
        }
        $r = $sum % 10;
        if ($r > 0) {
            $r = (10 - $r);
        }

        return $r;
    }
}
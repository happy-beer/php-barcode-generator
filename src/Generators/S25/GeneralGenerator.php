<?php


namespace Happybeer\Barcode\Generators\S25;


use Happybeer\Barcode\Exceptions\InvalidCharacterException;

abstract  class GeneralGenerator extends GeneratorGeneral
{

    /**
     * Standard 2 of 5 barcodes.
     * Used in airline ticket marking, photofinishing
     * Contains digits (0 to 9) and encodes the data only in the width of bars.
     *
     * @param $code (string) code to represent.
     * @param $checksum (boolean) if true add a checksum to the code
     * @return array barcode representation.
     * @protected
     */
    protected function barcodeGeneral($code, $checksum = false)
    {
        $chr['0'] = '10101110111010';
        $chr['1'] = '11101010101110';
        $chr['2'] = '10111010101110';
        $chr['3'] = '11101110101010';
        $chr['4'] = '10101110101110';
        $chr['5'] = '11101011101010';
        $chr['6'] = '10111011101010';
        $chr['7'] = '10101011101110';
        $chr['8'] = '10101110111010';
        $chr['9'] = '10111010111010';
        if ($checksum) {
            // add checksum
            $code .= $this->checksum($code);
        }
        if ((strlen($code) % 2) != 0) {
            // add leading zero if code-length is odd
            $code = '0' . $code;
        }
        $seq = '11011010';
        $clen = strlen($code);
        for ($i = 0; $i < $clen; ++$i) {
            $digit = $code{$i};
            if ( ! isset($chr[$digit])) {
                throw new InvalidCharacterException('Char ' . $digit . ' is unsupported');
            }
            $seq .= $chr[$digit];
        }
        $seq .= '1101011';
        $bararray = array('code' => $code, 'maxw' => 0, 'maxh' => 1, 'bcode' => array());

        return $this->binseq_to_array($seq, $bararray);
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
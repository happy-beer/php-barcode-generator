<?php
/**
 * Created by PhpStorm.
 * User: kitty
 * Date: 2019-11-19
 * Time: 21:33
 */

namespace Happybeer\Barcode\Generators;


abstract class GeneratorGeneral
{

    abstract function barcode($code);

    /**
     * Convert binary barcode sequence to TCPDF barcode array.
     *
     * @param $seq (string) barcode as binary sequence.
     * @param $bararray (array) barcode array.
     * òparam array $bararray TCPDF barcode array to fill up
     * @return array barcode representation.
     * @protected
     */
    protected function binseq_to_array($seq, $bararray)
    {
        $len = strlen($seq);
        $w = 0;
        $k = 0;
        for ($i = 0; $i < $len; ++$i) {
            $w += 1;
            if (($i == ($len - 1)) OR (($i < ($len - 1)) AND ($seq{$i} != $seq{($i + 1)}))) {
                if ($seq{$i} == '1') {
                    $t = true; // bar
                } else {
                    $t = false; // space
                }
                $bararray['bcode'][$k] = array('t' => $t, 'w' => $w, 'h' => 1, 'p' => 0);
                $bararray['maxw'] += $w;
                ++$k;
                $w = 0;
            }
        }

        return $bararray;
    }


    /**
     * Convert large integer number to hexadecimal representation.
     * (requires PHP bcmath extension)
     *
     * @param $number (string) number to convert specified as a string
     * @return string hexadecimal representation
     */
    protected function dec_to_hex($number)
    {
        if ($number == 0) {
            return '00';
        }

        $hex = [];

        while ($number > 0) {
            array_push($hex, strtoupper(dechex(bcmod($number, '16'))));
            $number = bcdiv($number, '16', 0);
        }
        $hex = array_reverse($hex);

        return implode($hex);
    }


    /**
     * Convert large hexadecimal number to decimal representation (string).
     * (requires PHP bcmath extension)
     *
     * @param $hex (string) hexadecimal number to convert specified as a string
     * @return string hexadecimal representation
     */
    protected function hex_to_dec($hex)
    {
        $dec = 0;
        $bitval = 1;
        $len = strlen($hex);
        for ($pos = ($len - 1); $pos >= 0; --$pos) {
            $dec = bcadd($dec, bcmul(hexdec($hex{$pos}), $bitval));
            $bitval = bcmul($bitval, 16);
        }

        return $dec;
    }
}
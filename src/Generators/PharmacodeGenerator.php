<?php


namespace Happybeer\Barcode\Generators;


use Happybeer\Barcode\Exceptions\InvalidCharacterException;

class PharmacodeGenerator extends GeneratorGeneral
{
    /**
     * Pharmacode
     * Contains digits (0 to 9)
     *
     * @param $code (string) code to represent.
     * @return array barcode representation.
     * @protected
     */
    function barcode($code)
    {
        $seq = '';
        $code = intval($code);
        while ($code > 0) {
            if (($code % 2) == 0) {
                $seq .= '11100';
                $code -= 2;
            } else {
                $seq .= '100';
                $code -= 1;
            }
            $code /= 2;
        }
        $seq = substr($seq, 0, -2);
        $seq = strrev($seq);
        $bararray = array('code' => $code, 'maxw' => 0, 'maxh' => 1, 'bcode' => array());

        return $this->binseq_to_array($seq, $bararray);
    }
}
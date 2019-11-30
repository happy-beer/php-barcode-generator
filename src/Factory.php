<?php

namespace Happybeer\Barcode;


use \Happybeer\Barcode\Generators;
use \Happybeer\Barcode\Exceptions;

class Factory
{

    /**
     * @param $type
     * @return Generators\GeneratorGeneral
     * @throws Exceptions\BarcodeException
     */
    public static function getGenerator($type)
    {
        switch (strtoupper($type)) {
            case BarcodeAllowTypes::TYPE_CODE_39: { // CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.
                return new Generators\C39\Generator();
                break;
            }
            case BarcodeAllowTypes::TYPE_CODE_39_CHECKSUM: { // CODE 39 with checksum
                return new Generators\C39\CheckSumGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_CODE_39E: { // CODE 39 EXTENDED
                return new Generators\C39\ExtGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_CODE_39E_CHECKSUM: { // CODE 39 EXTENDED + CHECKSUM
                return new Generators\C39\ExtCheckSumGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_CODE_93: { // CODE 93 - USS-93
                return new Generators\C93Generator();
                break;
            }
            case BarcodeAllowTypes::TYPE_STANDARD_2_5: { // Standard 2 of 5
                return new Generators\S25\Generator();
                break;
            }
            case BarcodeAllowTypes::TYPE_STANDARD_2_5_CHECKSUM: { // Standard 2 of 5 + CHECKSUM
                return new Generators\S25\CheckSumGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_INTERLEAVED_2_5: { // Interleaved 2 of 5
                return new Generators\I25\Generator();
                break;
            }
            case BarcodeAllowTypes::TYPE_INTERLEAVED_2_5_CHECKSUM: { // Interleaved 2 of 5 + CHECKSUM
                return new Generators\I25\CheckSumGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_CODE_128: { // CODE 128
                return new Generators\C128\Generator();
                break;
            }
            case BarcodeAllowTypes::TYPE_CODE_128_A: { // CODE 128 A
                return new Generators\C128\AGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_CODE_128_B: { // CODE 128 B
                return new Generators\C128\BGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_CODE_128_C: { // CODE 128 C
                return new Generators\C128\CGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_EAN_2: { // 2-Digits UPC-Based Extention
                return new Generators\EanExt\TwoGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_EAN_5: { // 5-Digits UPC-Based Extention
                return new Generators\EanExt\FiveGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_EAN_8: { // EAN 8
                return new Generators\EanUpc\EightGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_EAN_13: { // EAN 13
                return new Generators\EanUpc\ThirteenGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_UPC_A: { // UPC-A
                return new Generators\EanUpc\TwelveGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_UPC_E: { // UPC-E
                return new Generators\EanUpc\SixGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_MSI: { // MSI (Variation of Plessey code)
                return new Generators\Msi\Generator();
                break;
            }
            case BarcodeAllowTypes::TYPE_MSI_CHECKSUM: { // MSI + CHECKSUM (modulo 11)
                return new Generators\Msi\CheckSumGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_POSTNET: { // POSTNET
                return new Generators\PostNet\Generator();
                break;
            }
            case BarcodeAllowTypes::TYPE_PLANET: { // PLANET
                return new Generators\PostNet\PlanetGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_RMS4CC: { // RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)
                return new Generators\Rmc4cc\Generator();
                break;
            }
            case BarcodeAllowTypes::TYPE_KIX: { // KIX (Klant index - Customer index)
                return new Generators\Rmc4cc\KixGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_IMB: { // IMB - Intelligent Mail Barcode - Onecode - USPS-B-3200
                return new Generators\ImbGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_CODABAR: { // CODABAR
                return new Generators\CodebarGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_CODE_11: { // CODE 11
                return new Generators\Code11Generator();
                break;
            }
            case BarcodeAllowTypes::TYPE_PHARMA_CODE: { // PHARMACODE
                return new Generators\PharmacodeGenerator();
                break;
            }
            case BarcodeAllowTypes::TYPE_PHARMA_CODE_TWO_TRACKS: { // PHARMACODE TWO-TRACKS
                return new Generators\Pharmacode2tGenerator();
                break;
            }
            default: {
                throw new Exceptions\UnknownTypeException();
                break;
            }
        }
    }
}
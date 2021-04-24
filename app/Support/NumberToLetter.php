<?php

namespace App\Support;

class NumberToLetter
{
    private static $UNITS = [
        '',
        'UN ',
        'DOS ',
        'TRES ',
        'CUATRO ',
        'CINCO ',
        'SEIS ',
        'SIETE ',
        'OCHO ',
        'NUEVE ',
        'DIEZ ',
        'ONCE ',
        'DOCE ',
        'TRECE ',
        'CATORCE ',
        'QUINCE ',
        'DIECISEIS ',
        'DIECISIETE ',
        'DIECIOCHO ',
        'DIECINUEVE ',
        'VEINTE '
    ];

    private static $TENS = [
        'VENTI',
        'TREINTA ',
        'CUARENTA ',
        'CINCUENTA ',
        'SESENTA ',
        'SETENTA ',
        'OCHENTA ',
        'NOVENTA ',
        'CIEN '
    ];

    private static $HUNDREDS = [
        'CIENTO ',
        'DOSCIENTOS ',
        'TRESCIENTOS ',
        'CUATROCIENTOS ',
        'QUINIENTOS ',
        'SEISCIENTOS ',
        'SETECIENTOS ',
        'OCHOCIENTOS ',
        'NOVECIENTOS '
    ];

    public static function convert($number, $coin = '', $centimos = '', $forceCents = false)
    {
        $converted = '';
        $decimales = '';

        if (($number < 0) || ($number > 999999999)) {
            return 'No es posible convertir el numero a letras';
        }

        $div_decimales = explode('.', $number);

        if (count($div_decimales) > 1) {
            $number = $div_decimales[0];
            $decNumberStr = (string) $div_decimales[1];
            if (strlen($decNumberStr) >= 2) {
                $decNumberStrFill = str_pad($decNumberStr, 9, '0', STR_PAD_LEFT);
                $decCientos = substr($decNumberStrFill, 6);
                $decimales = self::convertGroup($decCientos);
            } else {
                $decNumberStr = $decNumberStr * 10;
                $decNumberStr = (string) $decNumberStr;
                $decNumberStrFill = str_pad($decNumberStr, 9, '0', STR_PAD_LEFT);
                $decCientos = substr($decNumberStrFill, 6);
                $decimales = self::convertGroup($decCientos);
            }
        } elseif (count($div_decimales) == 1 && $forceCents) {
            $decimales = 'CERO ';
        }

        $numberStr = (string) $number;
        $numberStrFill = str_pad($numberStr, 9, '0', STR_PAD_LEFT);
        $millones = substr($numberStrFill, 0, 3);
        $miles = substr($numberStrFill, 3, 3);
        $cientos = substr($numberStrFill, 6);

        if (intval($millones) > 0) {
            if ($millones == '001') {
                $converted .= 'UN MILLON ';
            } elseif (intval($millones) > 0) {
                $converted .= sprintf('%sMILLONES ', self::convertGroup($millones));
            }
        }

        if (intval($miles) > 0) {
            if ($miles == '001') {
                $converted .= 'MIL ';
            } elseif (intval($miles) > 0) {
                $converted .= sprintf('%sMIL ', self::convertGroup($miles));
            }
        }

        if (intval($cientos) > 0) {
            if ($cientos == '001') {
                $converted .= 'UN ';
            } elseif (intval($cientos) > 0) {
                $converted .= sprintf('%s ', self::convertGroup($cientos));
            }
        }

        $convertedValue = $converted . strtoupper($coin);

        return $convertedValue;
    }

    private static function convertGroup($n)
    {
        $output = '';

        if ($n == '100') {
            $output = "CIEN ";
        } elseif ($n[0] !== '0') {
            $output = self::$HUNDREDS[$n[0] - 1];
        }

        $k = intval(substr($n, 1));

        if ($k <= 20) {
            $output .= self::$UNITS[$k];
        } else {
            if (($k >= 30) && ($n[2] !== '0')) {
                $output .= sprintf('%sY %s', self::$TENS[intval($n[1]) - 2], self::$UNITS[intval($n[2])]);
            } else {
                $output .= sprintf('%s%s', self::$TENS[intval($n[1]) - 2], self::$UNITS[intval($n[2])]);
            }
        }

        return $output;
    }
}

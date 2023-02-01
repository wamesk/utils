<?php

namespace Wame\Utils\Helpers;

class Number
{
    /**
     * @param float $number
     * @param float $discount - percentage
     * @param bool $type - false - minus, true - plus
     *
     * @return float
     */
    public static function discount($number, $discount, $type = false): float
    {
        if ($type == true) {
            return $number + (($number / 100) * $discount);
        } else {
            return $number - (($number / 100) * $discount);
        }
    }


    /**
     * @param float $number1
     * @param float $number2
     *
     * @return float
     */
    public static function percentage($number1, $number2): float
    {
        return (100 * ($number2 - $number1)) / $number1;
    }


    /**
     * @param float $number
     * @param float $discount - percentage
     * @param bool $type - false without tax, true with tax
     *
     * @return float
     */
    public static function tax($number, $tax, $type = false): float
    {
        // With tax
        if ($type == true) {
            return $number * (($tax / 100) + 1);
        }
        // Without tax
        else {
            return $number / (($tax / 100) + 1);
        }
    }


    /**
     * @param float $number
     * @param float $coefficient
     * @param int $decimal
     * @param int $round
     *
     * @return float
     */
    public static function calculate($number, $coefficient, $decimal, $round): float
    {
        return round($number * $coefficient, $decimal, $round == 0 ? PHP_ROUND_HALF_DOWN : PHP_ROUND_HALF_UP);
    }


    /**
     * @param float $number
     *
     * @return float
     */
    public static function normalize($number): float
    {
        return (float) str_replace(',', '.', $number);
    }
}

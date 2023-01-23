<?php

namespace Wame\Utils\Helpers;


class Strings
{
    /**
     * Covert camel case
     *
     * @param string $string
     * @param string $separator
     * @param boolean $lower
     *
     * @return string
     */
    public static function camelCaseConvert($string, $separator = '_', $lower = true): string
    {
        if (empty($string)) return $string;

        $string = lcfirst($string);
        $string = preg_replace("/[A-Z]/", $separator . "$0", $string);

        return $lower ? strtolower($string) : $string;
    }


    /**
     * Convert string to CamelCase
     *
     * e.g.: Example phrase -> ExamplePhrase
     *
     * @param string $string string
     * @param bool $capitalizeFirstCharacter capitalize first letter
     *
     * @return string
     */
    public static function camelize(string $string, bool $capitalizeFirstCharacter = false): string
    {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));

        return $capitalizeFirstCharacter === true ? ucfirst($str) : lcfirst($str);
    }


    /**
     * Convert string to underscore
     *
     * e.g.: Example phrase -> example_phrase
     *
     * @param string $string
     *
     * @return string
     */
    public static function underscore(string $string): string
    {
        return strtolower(preg_replace('#(\w)([A-Z])#', '$1_$2', $string));
    }


    /**
     * Convert string with dashes to CamelCase
     *
     * e.g.: example-phrase -> ExamplePhrase
     *
     * @param string $string string
     * @param bool $capitalizeFirstCharacter capitalize first letter
     *
     * @return string
     */
    public static function camelizeDashes(string $string, bool $capitalizeFirstCharacter = false): string
    {
        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', self::webalize($string, null, false))));

        return $capitalizeFirstCharacter === true ? ucfirst($str) : lcfirst($str);
    }


    /**
     * https://stackoverflow.com/questions/24486115/calculate-percentage-of-matching-words-in-a-string-of-words
     *
     * @param string $string1
     * @param string $string2
     *
     * @return int
     */
    public static function matchPercent($string1, $string2)
    {
        $array1 = explode(' ', $string1);
        $array2 = explode(' ', $string2);
        $match = array_intersect($array2, $array1);

        return count($match) * 100 / count($array2);
    }

}

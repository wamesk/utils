<?php

namespace Wame\Utils\Helpers;


class Translator
{
    /**
     * Translate array values
     *
     * e.g. Select filed options form config
     * Select::make('example')
     *     ->options(Translator::arrayValue(config('wame.example'))
     *
     * @param array $list
     *
     * @return array
     */
    public static function arrayValue($list)
    {
        return array_map(fn ($value) => __($value), $list);
    }

}

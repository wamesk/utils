<?php

namespace Wame\Utils\Helpers;


class Time
{
    public static function hoursList($affix = '00')
    {
        $return = [];

        for ($i = 0; $i <= 23; $i++) {
            $time = \Nette\Utils\Strings::padLeft($i, 2, '0') . ':' . $affix;

            $return[$time] = $time;
        }

        return $return;
    }

}

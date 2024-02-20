<?php

declare(strict_types = 1);

namespace Wame\Utils\Enums;

trait ToArray
{
    public static function toArray(): array
    {
        $return = [];

        foreach (self::cases() as $case) {
            $return[$case->value] = $case->title();
        }

        return $return;
    }
}

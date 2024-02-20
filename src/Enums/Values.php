<?php

declare(strict_types = 1);

namespace Wame\Utils\Enums;

trait Values
{
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

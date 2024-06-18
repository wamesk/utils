<?php

declare(strict_types = 1);

namespace Wame\Utils\Helpers;

use Exception;

class Phone
{
    public static function normalize(string $phone, string $country, bool $exception = false): array|string|null
    {
        if (!$phone) {
            return null;
        }

        if (is_array($phone)) {
            $return = [];

            foreach ($phone as $key => $value) {
                $return[$key] = self::process($value, $country, $exception);
            }

            return $return;
        }

        return self::process($phone, $country, $exception);
    }

    private static function process(string $original, string $country, bool $exception): array|string
    {
        $phone = str_replace(' ', '', $original);

        if (preg_match('/^[0-9+]+$/', $phone)) {
            try {
                return str_replace(' ', '', phone($phone, $country)->formatInternational());
            } catch (Exception $e) {
                if (true === $exception) {
                    throw new Exception($e->getMessage());
                }
            }
        } elseif (true === $exception) {
            throw new Exception('Wrong format');
        }

        return trim($original);
    }
}

<?php

namespace Mkioschi\Support\Types\Address\PostalCode;

use Mkioschi\Support\Utils\StrUtil;

class Br implements PostalCodeStandard
{
    public static function isValid(mixed $value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        if (strlen($value) !== 9) {
            return false;
        }

        if (substr($value, 5, 1) !== '-') {
            return false;
        }

        $postalCode = StrUtil::extractNumbers($value);

        if (strlen($postalCode) !== 8) {
            return false;
        }

        return is_numeric($postalCode);
    }
}
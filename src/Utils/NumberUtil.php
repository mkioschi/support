<?php

namespace Mkioschi\Support\Utils;

class NumberUtil
{
    public static function numberFormat(
        float $value,
        int $decimalPlaces = 2,
        string $decimalSeparator = '.',
        string $thousandsSeparator = '',
    ): string
    {
        return number_format(
            num: $value,
            decimals: $decimalPlaces,
            decimal_separator: $decimalSeparator,
            thousands_separator: $thousandsSeparator
        );
    }

    public static function convertToPositive(float|int $value): float|int
    {
        return abs($value);
    }

    public static function convertToNegative(float|int $value): float|int
    {
        return -abs($value);
    }
}
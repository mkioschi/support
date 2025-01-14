<?php

namespace Mkioschi\Support\Types\UnitOfMeasurement\Length;

class Pixel extends Length
{
    const string NAME = 'Pixel';
    const string PLURAL = 'Pixels';
    const string SYMBOL = 'px';

    public static function getSymbol(): string
    {
        return self::SYMBOL;
    }

    public static function getName(): string
    {
        return self::NAME;
    }

    public static function getPlural(): string
    {
        return self::PLURAL;
    }

    protected function normalize(Length|float|int $value): float|int
    {
        // TODO: Implement normalize() method.
    }
}

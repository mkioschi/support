<?php

namespace Mkioschi\Support\Types\UnitOfMeasurement\Weight;

class Gram extends Weight
{
    const string NAME = 'Gram';
    const string PLURAL = 'Grams';
    const string SYMBOL = 'g';

    public static function fromKilograms(float|int $value): Gram
    {
        return new Gram(self::convertKilogramToGram($value));
    }

    public static function innFromKilograms(float|int|null $value): ?Gram
    {
        if (is_null($value)) {
            return null;
        }

        return new Gram(self::convertKilogramToGram($value));
    }

    public function toKilograms(): Kilogram
    {
        return Kilogram::fromGrams($this->value);
    }

    public static function fromPounds(float|int $value): Gram
    {
        return new Gram(self::convertPoundToGram($value));
    }

    public static function innFromPounds(float|int|null $value): ?Gram
    {
        if (is_null($value)) {
            return null;
        }

        return new Gram(self::convertPoundToGram($value));
    }

    public function toPounds(): Pound
    {
        return Pound::fromGrams($this->value);
    }

    public static function fromOunces(float|int $value): Gram
    {
        return new Gram(self::convertOunceToGram($value));
    }

    public static function innFromOunces(float|int|null $value): ?Gram
    {
        if (is_null($value)) {
            return null;
        }

        return new Gram(self::convertOunceToGram($value));
    }

    public function toOunces(): Ounce
    {
        return Ounce::fromGrams($this->value);
    }

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

    protected function normalize(Weight|float|int $value): float|int
    {
        if (is_int($value) || is_float($value)) {
            return $value;
        }

        return match (get_class($value)) {
            Gram::class => $value->value,
            Kilogram::class => self::convertKilogramToGram($value->value),
            Ounce::class => self::convertOunceToGram($value->value),
            Pound::class => self::convertPoundToGram($value->value),
        };
    }
}

<?php

namespace Mkioschi\Support\Types\Address\PostalCode;

interface PostalCodeStandard
{
    public static function isValid(string $value): bool;
}

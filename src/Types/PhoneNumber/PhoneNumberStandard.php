<?php

namespace Mkioschi\Support\Types\PhoneNumber;

interface PhoneNumberStandard
{
    public function isValid(
        string $countryCode,
        string $areaCode,
        string $localNumber
    ): bool;

    public function makeHumansFormat(
        string $countryCode,
        string $areaCode,
        string $localNumber
    ): string;

    public function makeHiddenFormat(
        string $countryCode,
        string $areaCode,
        string $localNumber,
        string $maskCharacter
    ): string;
}
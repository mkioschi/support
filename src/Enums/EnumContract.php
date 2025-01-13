<?php

namespace Mkioschi\Support\Enums;

interface EnumContract
{
    /**
     * @return array
     */
    public static function labels(): array;

    /**
     * @return array
     */
    public static function values(): array;

    /**
     * @param mixed $value
     * @return mixed
     */
    public static function innFrom(mixed $value): mixed;

    /**
     * @return string
     */
    public function label(): string;
}

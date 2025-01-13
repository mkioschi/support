<?php

namespace Mkioschi\Support\Utils;

class StrUtil
{
    public static function extractNumbers(string $value): string
    {
        return preg_replace(pattern: '/\D/i', replacement: '', subject: trim($value));
    }
}
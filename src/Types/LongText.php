<?php

namespace Mkioschi\Support\Types;

class LongText extends Text
{
    /**
     * @throws InvalidTypeException
     */
    protected function __construct(string $value)
    {
        if (!self::isValid($value, $errors)) {
            throw new InvalidTypeException(
                message: 'Invalid LongText value.',
                errors: $errors
            );
        }

        parent::__construct($value);
    }

    public static function isValid(string $value, ?array &$errors = null): bool
    {
        return true;
    }
}

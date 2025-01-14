<?php

namespace Mkioschi\Support\Types;

class ShortText extends Text
{
    /**
     * @throws InvalidTypeException
     */
    protected function __construct(string $value)
    {
        if (!self::isValid($value, $errors)) {
            throw new InvalidTypeException(
                message: 'Invalid ShortText value.',
                errors: $errors
            );
        }

        parent::__construct($value);
    }

    public static function isValid(string $value, ?array &$errors = null): bool
    {
        $validatorErrors = [];

        if (strlen($value) > 255) {
            $validatorErrors = "The value \"$value\" is too long. Maximum 255 characters allowed.";
        }

        if (empty($validatorErrors)) {
            return true;
        }

        if ($errors !== null) {
            $errors = $validatorErrors;
        }

        return false;
    }
}

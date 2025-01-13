<?php

namespace Mkioschi\Support\Types\Misc;

use Cocur\Slugify\Slugify;
use Mkioschi\Support\Types\InvalidTypeException;
use Mkioschi\Support\Types\Text;

class Slug extends Text
{

    /**
     * @throws InvalidTypeException
     */
    protected function __construct(string $value)
    {
        if (!self::isValid($value, $errors)) {
            throw new InvalidTypeException(
                message: 'Invalid Slug value.',
                errors: $errors
            );
        }

        parent::__construct($value);
    }

    public static function isValid(string $value, &$errors = null): bool
    {
        $errors = $errors ?? [];

        if ($value === '') {
            $errors[] = 'The value cannot be empty.';
        }

        if (strlen($value) > 255) {
            $errors[] = "The value \"$value\" is too long. Maximum 255 characters allowed.";
        }

        return empty($errors);
    }

    /**
     * @throws InvalidTypeException
     */
    public static function parse(string $text): Slug
    {
        return new Slug(self::slugify($text));
    }

    public static function slugify(string $value): string
    {
        $slugify = new Slugify();
        return $slugify->slugify($value);
    }
}

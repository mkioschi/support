<?php

namespace Mkioschi\Support\Types\Web;

use Mkioschi\Support\Enums\FileExtension;
use Mkioschi\Support\Types\InvalidTypeException;
use Mkioschi\Support\Types\Text;

class FileName extends Text
{
    public ?FileExtension $extension{
        get => FileExtension::tryParse(strrchr($this->value, '.'));
    }
    /**
     * @throws InvalidTypeException
     */
    protected function __construct(string $value)
    {
        if (strlen($value) > 255) {
            throw new InvalidTypeException('File name is too long. Maximum 255 characters allowed.');
        }

        parent::__construct($value);
    }
}
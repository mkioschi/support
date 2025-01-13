<?php

namespace Mkioschi\Support\Types;

use Exception;

abstract class Text
{
    public string $value;

    protected function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function from(string $value): static
    {
        return new static($value);
    }

    public static function tryFrom(string $value): ?static
    {
        try {
            return new static($value);
        } catch (Exception) {
            return null;
        }
    }

    public static function innFrom(?string $value): ?static
    {
        if (is_null($value)) return null;
        return new static($value);
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equals(self $value): bool
    {
        return $this->value === $value->value;
    }

    public function length(): int
    {
        return strlen($this->value);
    }
}

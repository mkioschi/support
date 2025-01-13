<?php

namespace Mkioschi\Support\Types;

abstract class AbstractType implements TypeInterface
{
    public function clone(): static
    {
        return clone $this;
    }
}

<?php

namespace Mkioschi\Support\Types;

use Exception;
use Throwable;

class InvalidTypeException extends Exception
{
    /** @var ?string[] */
    public ?array $errors;

    /**
     * @param ?string[] $errors
     */
    public function __construct(
        string $message = 'Invalid value.',
        ?array $errors = null,
        ?Throwable $previous = null,
    )
    {
        $this->errors = $errors;

        parent::__construct(
            message: $message,
            previous: $previous
        );
    }
}
<?php

namespace Mkioschi\Support\Types\National\Brazil;

use Mkioschi\Support\Types\InvalidTypeException;
use Mkioschi\Support\Types\Text;
use Mkioschi\Support\Utils\StrUtil;

class Cpf extends Text
{
    /**
     * @throws InvalidTypeException
     */
    protected function __construct(string $value)
    {
        if (!self::isValid($value)) {
            throw new InvalidTypeException(sprintf('%s is an invalid Cpf type.', $value));
        }

        parent::__construct(StrUtil::extractNumbers($value));
    }

    public static function isValid(mixed $value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        $cpf = StrUtil::extractNumbers($value);

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match(pattern: '/(\d)\1{10}/', subject: $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    public function getHumansFormat(): string
    {
        return sprintf(
            '%s.%s.%s-%s',
            substr($this->value, 0, 3),
            substr($this->value, 3, 3),
            substr($this->value, 6, 3),
            substr($this->value, -2)
        );
    }
}

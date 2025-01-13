<?php

namespace Mkioschi\Support\Enums;

enum UnitTime: string implements EnumContract
{
    case MICROSECOND = 'us';
    case MILISECOND = 'ms';
    case SECOND = 's';
    case MINUTE = 'min';
    case HOUR = 'h';

    public static function values(): array
    {
        return array_column(
            array: self::cases(),
            column_key: 'value'
        );
    }

    public static function innFrom(mixed $value): ?self
    {
        if (is_null($value)) {
            return null;
        }

        return self::from($value);
    }

    public function label(): string
    {
        return self::labels()[$this->value];
    }

    public static function labels(): array
    {
        return [
            self::MICROSECOND->value => 'Microsecond',
            self::MILISECOND->value => 'Milisecond',
            self::SECOND->value => 'Second',
            self::MINUTE->value => 'Minute',
            self::HOUR->value => 'Hour',
        ];
    }
}

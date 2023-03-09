<?php

namespace App\Enum;

/**
 * Класс с данными tax номеров
 *
 * @author Daniil Ilin <daniil.ilin@gmail.com>
 */
class TaxNumberEnum
{
    public const DENMARK = 'DE';
    public const ITALY   = 'IT';
    public const GREECE  = 'GR';

    public const DENMARK_TAX = 19;
    public const ITALY_TAX   = 22;
    public const GREECE_TAX  = 24;

    /**
     * Получение списка кодов стран
     */
    public static function getCountryCodes(): array
    {
        return [
            self::DENMARK,
            self::ITALY,
            self::GREECE,
        ];
    }

    /**
     * Получение значений налога стран
     */
    public static function getCountryTax(): array
    {
        return [
            self::DENMARK => self::DENMARK_TAX,
            self::ITALY => self::ITALY_TAX,
            self::GREECE => self::GREECE_TAX,
        ];
    }
}

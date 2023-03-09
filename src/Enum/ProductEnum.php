<?php

namespace App\Enum;

/**
 * Класс с данными товаров
 *
 * @author Daniil Ilin <daniil.ilin@gmail.com>
 */
class ProductEnum
{
    public const HEADPHONES = 'headphones';
    public const PHONECASE  = 'phonecase';

    public const HEADPHONES_PRICE = 100;
    public const PHONECASE_PRICE  = 20;

    public static function getChoiceItems(): array
    {
        return [
            'Наушники' => self::HEADPHONES,
            'Чехол для телефона' => self::PHONECASE,
        ];
    }

    public static function getItemsValue(): array
    {
        return [
            self::HEADPHONES => self::HEADPHONES_PRICE,
            self::PHONECASE => self::PHONECASE_PRICE,
        ];
    }
}

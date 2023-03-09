<?php

namespace App\Service;

use App\Enum\ProductEnum;
use App\Enum\TaxNumberEnum;

/**
 * Сервис для расчета цены товара
 *
 * @author Daniil Ilin <daniil.ilin@gmail.com>
 */
class OrderService
{
    /**
     * Метод расчета цены товара
     */
    public function process(array $data): int
    {
        $productCost = ProductEnum::getItemsValue()[$data['product']];
        $tax = TaxNumberEnum::getCountryTax()[substr($data['taxNumber'], 0, 2)];
        return $productCost + ($productCost / 100 * $tax);
    }
}
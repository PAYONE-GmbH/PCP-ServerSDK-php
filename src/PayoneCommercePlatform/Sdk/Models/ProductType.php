<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description Enum to classify items that are purchased
 * * GOODS - Goods
 * * SHIPMENT - Shipping charges
 * * HANDLING_FEE - Handling fee
 * * DISCOUNT - Voucher / discount
 */
enum ProductType: string
{
    case GOODS = 'GOODS';
    case SHIPMENT = 'SHIPMENT';
    case HANDLING_FEE = 'HANDLING_FEE';
    case DISCOUNT = 'DISCOUNT';
}

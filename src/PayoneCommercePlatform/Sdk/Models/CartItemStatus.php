<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description Indicates in which status the line item is.
 */
enum CartItemStatus: string
{
    case ORDERED = 'ORDERED';
    case DELIVERED = 'DELIVERED';
    case CANCELLED = 'CANCELLED';
    case RETURNED = 'RETURNED';
    case WAITING_FOR_PAYMENT = 'WAITING_FOR_PAYMENT';
}

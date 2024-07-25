<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description Enum to specify the payment channel.
 */
enum PaymentChannel: string
{
    case ECOMMERCE = 'ECOMMERCE';
    case POS = 'POS';
}

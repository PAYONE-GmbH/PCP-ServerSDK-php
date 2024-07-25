<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description Current high-level status of the Checkout
 */
enum StatusCheckout: string
{
    case OPEN = 'OPEN';
    case PENDING_COMPLETION = 'PENDING_COMPLETION';
    case COMPLETED = 'COMPLETED';
    case BILLED = 'BILLED';
    case CHARGEBACKED = 'CHARGEBACKED';
    case DELETED = 'DELETED';
}

<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description Confirmation values for PayPal completion flows.
 */
enum CompletePaymentProduct840Action: string
{
    case CONFIRM_ORDER_STATUS = 'CONFIRM_ORDER_STATUS';
}

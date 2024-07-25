<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Indicates which payment endpoints can be used for the respective Checkout.
 * The systems offers two alternatives to trigger a payment and consecutive events:
 * OrderManagementCheckoutActions or the Payment Execution resource.
 * Both alternatives can be used simultaneously but once one of the Payment Execution endpoints is used the
 * Order Management endpoints can no longer be used for that Checkout since it is no longer possible to match
 * payment events to items of the Checkout.
 */
enum AllowedPaymentActions: string
{
    case ORDER_MANAGEMENT = 'ORDER_MANAGEMENT';
    case PAYMENT_EXECUTION = 'PAYMENT_EXECUTION';
}

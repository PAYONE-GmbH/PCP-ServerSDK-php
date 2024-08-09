<?php

namespace PayoneCommercePlatform\Sdk\Models\ApplePay;

/**
 * A string that represents the type of the payment method.
 *
 * The type of card the customer uses to complete the transaction.
 */
enum ApplePayPaymentMethodType: string
{
    case DEBIT = "debit";
    case CREDIT = "credit";
    case PREPAID = "prepaid";
    case STORE = "store";
}

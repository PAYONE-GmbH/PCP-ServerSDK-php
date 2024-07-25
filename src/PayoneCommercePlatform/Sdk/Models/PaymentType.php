<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description Defines the respective payment type.
 */
enum PaymentType: string
{
    case SALE = 'SALE';
    case RESERVATION = 'RESERVATION';
    case CAPTURE = 'CAPTURE';
    case REFUND = 'REFUND';
    case REVERSAL = 'REVERSAL';
    case CHARGEBACK_REVERSAL = 'CHARGEBACK_REVERSAL';
    case CREDIT_NOTE = 'CREDIT_NOTE';
    case DEBIT_NOTE = 'DEBIT_NOTE';
}

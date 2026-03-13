<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description Period of payment occurrence for recurring and installment payments.
 */
enum CardOnFileRecurringFrequency: string
{
    case Yearly = 'Yearly';
    case Quarterly = 'Quarterly';
    case Monthly = 'Monthly';
    case Weekly = 'Weekly';
    case Daily = 'Daily';
}

<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description Enum for recurring payment sequence indicator values.
 * 
 * * first = This transaction is the first of a series of recurring transactions
 * * recurring = This transaction is a subsequent transaction in a series of recurring transactions
 * 
 * Note: For any first of a recurring the system will automatically create a token as you will need to use a
 * token for any subsequent recurring transactions. In case a token already exists this is indicated in the
 * response with a value of False for the isNewToken property in the response.
 */
enum RecurringPaymentSequenceIndicator: string
{
    case FIRST = 'first';
    case RECURRING = 'recurring';
}

<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description Enum for business relation values.
 * 
 * Business relation to the customer. Possible values:        
 * * B2C - Indicates business to consumer
 * * B2B - Indicates business to business
 * 
 *  Mandatory for the the following payment methods:
 * * 3390 - PAYONE Secured Invoice
 * * 3391 - PAYONE Secured Installment
 * * 3392 - PAYONE Secured Direct Debit
 */
enum BusinessRelation: string
{
    case B2C = 'B2C';
    case B2B = 'B2B';
}

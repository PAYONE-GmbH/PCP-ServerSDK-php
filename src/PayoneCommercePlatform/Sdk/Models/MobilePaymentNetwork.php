<?php

namespace PayoneCommercePlatform\Sdk\Models;

enum MobilePaymentNetwork: string
{
    case MASTERCARD = 'MASTERCARD';
    case VISA = 'VISA';
    case AMEX = 'AMEX';
    case GIROCARD = 'GIROCARD';
    case DISCOVER = 'DISCOVER';
    case JCB = 'JCB';
}

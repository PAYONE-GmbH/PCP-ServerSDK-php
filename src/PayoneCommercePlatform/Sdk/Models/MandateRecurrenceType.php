<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description Specifies whether the mandate is for one-off or recurring payments. Possible values are:
 * * UNIQUE
 * * RECURRING
 */
enum MandateRecurrenceType: string
{
    case UNIQUE = 'UNIQUE';
    case RECURRING = 'RECURRING';
}

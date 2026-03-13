<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description The gender of the customer.
 */
enum Gender: string
{
    case MALE = 'MALE';
    case FEMALE = 'FEMALE';
    case UNKNOWN = 'UNKNOWN';
}

<?php

namespace PayoneCommercePlatform\Sdk\Models;

enum PayLinkStatusValue: string
{
    case ACTIVE = 'ACTIVE';
    case PAID = 'PAID';
    case EXPIRED = 'EXPIRED';
    case REDIRECTED = 'REDIRECTED';
}

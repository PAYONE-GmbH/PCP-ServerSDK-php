<?php

namespace PayoneCommercePlatform\Sdk\Models;

enum FundDistributionType: string
{
    case SELLER_REVENUE = 'SELLER_REVENUE';
    case COMMISSION_FEE = 'COMMISSION_FEE';
    case SHIPPING_COSTS = 'SHIPPING_COSTS';
    case TAX = 'TAX';
    case PLATFORM_FEE = 'PLATFORM_FEE';
    case OTHER = 'OTHER';
}

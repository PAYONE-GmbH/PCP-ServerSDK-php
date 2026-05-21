<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * Indicates the event upon which the payment should be captured. 
 * This value is shown to customers in the Wero portal to clarify
 * when the capture will occur.
 * Has the following possible values:
 * - shipping: Upon shipping the order.
 * - delivery: Upon delivering the order.
 * - availability: As soon as the order is available.
 * - serviceFulfillment: Upon fulfilling the service.
 * - other: For any other use case.
 */
enum CaptureTrigger: string
{
    case SHIPPING = 'shipping';
    case DELIVERY = 'delivery';
    case AVAILABILITY = 'availability';
    case SERVICE_FULFILLMENT = 'serviceFulfillment';
    case OTHER = 'other';
}

<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description The returnType refers to the ShoppingCart items of the Checkout. returnType = FULL should be provided if all items should be marked as returned and the payment for the entire ShoppingCart should be refunded. returnType = PARTIAL should be provided if only certain items should be marked as returned and the Refund should not be made for the entire ShoppingCart. For this type the list of items has to be provided. Following conditions apply to the Return request: * items must be in status DELIVERED * there was no Capture, Refund or Cancel triggered over the Payment Execution resource * for the deliverType FULL no items are provided in the request. Note: If a DISCOUNT productType is among the ShoppingCart items, only returnType FULL is possible.
 */
enum ReturnType: string
{
    case FULL = 'FULL';
    case PARTIAL = 'PARTIAL';
}

<?php
/**
 * ExtendedCheckoutStatus
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Commerce Platform API
 *
 * RESTful API for the creation of Commerce Cases with Checkouts and the execution of Payments.
 *
 * The version of the OpenAPI document: 1.6.0
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.4.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace PayoneCommercePlatform\Sdk\Domain;

use PayoneCommercePlatform\Sdk\ObjectSerializer;

/**
 * ExtendedCheckoutStatus Class Doc Comment
 *
 * @category Class
 * @description The extendedCheckoutStatus provides a more granular status of the Checkout based on the respective amounts. The extendedCheckoutStatus include the regular Checkout status OPEN, DELETED, PENDING_COMPLETION, COMPLETED, BILLED, and CHARGEBACK as well as three additional status:  1. PARTIALLY_BILLED: Checkout amount has been partially collected. Overall the Checkout status is BILLED and one of the following conditions is true:   (1) the openAmount is greater than zero or   (2) the openAmount is zero, the refundAmount is zero and the checkoutAmount is not equal to collectedAmount plus the cancelledAmount. 2. PARTIALLY_REFUNDED: The entire Checkout amount has been captured and an amount has been partially refunded to customer. Overall the Checkout status is BILLED, the openAmount is zero and the refundAmount and collectedAmount are greater than zero. 3. REFUNDED: The entire Checkout amount has been refunded to the customer. Overall the Checkout status is BILLED, the openAmount and collectedAmount are zero but the refundAmount is greater than zero.
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ExtendedCheckoutStatus
{
    /**
     * Possible values of this enum
     */
    public const OPEN = 'OPEN';

    public const DELETED = 'DELETED';

    public const PENDING_COMPLETION = 'PENDING_COMPLETION';

    public const COMPLETED = 'COMPLETED';

    public const PARTIALLY_BILLED = 'PARTIALLY_BILLED';

    public const BILLED = 'BILLED';

    public const CHARGEBACKED = 'CHARGEBACKED';

    public const PARTIALLY_REFUNDED = 'PARTIALLY_REFUNDED';

    public const REFUNDED = 'REFUNDED';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::OPEN,
            self::DELETED,
            self::PENDING_COMPLETION,
            self::COMPLETED,
            self::PARTIALLY_BILLED,
            self::BILLED,
            self::CHARGEBACKED,
            self::PARTIALLY_REFUNDED,
            self::REFUNDED
        ];
    }
}

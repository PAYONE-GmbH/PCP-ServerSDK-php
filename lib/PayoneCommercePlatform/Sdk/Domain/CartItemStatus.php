<?php
/**
 * CartItemStatus
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
 * CartItemStatus Class Doc Comment
 *
 * @category Class
 * @description Indicates in which status the line item is
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class CartItemStatus
{
    /**
     * Possible values of this enum
     */
    public const ORDERED = 'ORDERED';

    public const DELIVERED = 'DELIVERED';

    public const CANCELLED = 'CANCELLED';

    public const RETURNED = 'RETURNED';

    public const WAITING_FOR_PAYMENT = 'WAITING_FOR_PAYMENT';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ORDERED,
            self::DELIVERED,
            self::CANCELLED,
            self::RETURNED,
            self::WAITING_FOR_PAYMENT
        ];
    }
}

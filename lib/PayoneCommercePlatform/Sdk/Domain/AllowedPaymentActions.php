<?php
/**
 * AllowedPaymentActions
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
use \PayoneCommercePlatform\Sdk\ObjectSerializer;

/**
 * AllowedPaymentActions Class Doc Comment
 *
 * @category Class
 * @description Indicates which payment endpoints can be used for the respective Checkout. The systems offers two alternatives to trigger a payment and consecutive events: OrderManagementCheckoutActions or the Payment Execution resource. Both alternatives can be used simultaneously but once one of the Payment Execution endpoints is used the Order Management endpoints can no longer be used for that Checkout since it is no longer possible to match payment events to items of the Checkout.
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AllowedPaymentActions
{
    /**
     * Possible values of this enum
     */
    public const ORDER_MANAGEMENT = 'ORDER_MANAGEMENT';

    public const PAYMENT_EXECUTION = 'PAYMENT_EXECUTION';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ORDER_MANAGEMENT,
            self::PAYMENT_EXECUTION
        ];
    }
}



<?php
/**
 * PaymentType
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
 * PaymentType Class Doc Comment
 *
 * @category Class
 * @description Defines the respective payment type.
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PaymentType
{
    /**
     * Possible values of this enum
     */
    public const SALE = 'SALE';

    public const RESERVATION = 'RESERVATION';

    public const CAPTURE = 'CAPTURE';

    public const REFUND = 'REFUND';

    public const REVERSAL = 'REVERSAL';

    public const CHARGEBACK_REVERSAL = 'CHARGEBACK_REVERSAL';

    public const CREDIT_NOTE = 'CREDIT_NOTE';

    public const DEBIT_NOTE = 'DEBIT_NOTE';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::SALE,
            self::RESERVATION,
            self::CAPTURE,
            self::REFUND,
            self::REVERSAL,
            self::CHARGEBACK_REVERSAL,
            self::CREDIT_NOTE,
            self::DEBIT_NOTE
        ];
    }
}



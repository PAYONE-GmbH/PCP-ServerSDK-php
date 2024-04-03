<?php
/**
 * CheckoutResponse
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

use \ArrayAccess;
use \PayoneCommercePlatform\Sdk\ObjectSerializer;

/**
 * CheckoutResponse Class Doc Comment
 *
 * @category Class
 * @description The Checkout corresponds to the order of the WL API. We do not take additionalInput from the WL API. We have no  shipping and use deliveryAddress instead of address.
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CheckoutResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CheckoutResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'commerceCaseId' => 'string',
        'checkoutId' => 'string',
        'merchantCustomerId' => 'string',
        'amountOfMoney' => '\PayoneCommercePlatform\Sdk\Domain\AmountOfMoney',
        'references' => '\PayoneCommercePlatform\Sdk\Domain\CheckoutReferences',
        'shipping' => '\PayoneCommercePlatform\Sdk\Domain\Shipping',
        'shoppingCart' => '\PayoneCommercePlatform\Sdk\Domain\ShoppingCartResult',
        'paymentExecutions' => '\PayoneCommercePlatform\Sdk\Domain\PaymentExecution[]',
        'checkoutStatus' => '\PayoneCommercePlatform\Sdk\Domain\StatusCheckout',
        'statusOutput' => '\PayoneCommercePlatform\Sdk\Domain\StatusOutput',
        'paymentInformation' => '\PayoneCommercePlatform\Sdk\Domain\PaymentInformationResponse[]',
        'creationDateTime' => '\DateTime',
        'allowedPaymentActions' => '\PayoneCommercePlatform\Sdk\Domain\AllowedPaymentActions[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'commerceCaseId' => 'UUID',
        'checkoutId' => 'UUID',
        'merchantCustomerId' => null,
        'amountOfMoney' => null,
        'references' => null,
        'shipping' => null,
        'shoppingCart' => null,
        'paymentExecutions' => null,
        'checkoutStatus' => null,
        'statusOutput' => null,
        'paymentInformation' => null,
        'creationDateTime' => 'date-time',
        'allowedPaymentActions' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'commerceCaseId' => false,
        'checkoutId' => false,
        'merchantCustomerId' => false,
        'amountOfMoney' => false,
        'references' => false,
        'shipping' => false,
        'shoppingCart' => false,
        'paymentExecutions' => false,
        'checkoutStatus' => false,
        'statusOutput' => false,
        'paymentInformation' => false,
        'creationDateTime' => false,
        'allowedPaymentActions' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'commerceCaseId' => 'commerceCaseId',
        'checkoutId' => 'checkoutId',
        'merchantCustomerId' => 'merchantCustomerId',
        'amountOfMoney' => 'amountOfMoney',
        'references' => 'references',
        'shipping' => 'shipping',
        'shoppingCart' => 'shoppingCart',
        'paymentExecutions' => 'paymentExecutions',
        'checkoutStatus' => 'checkoutStatus',
        'statusOutput' => 'statusOutput',
        'paymentInformation' => 'paymentInformation',
        'creationDateTime' => 'creationDateTime',
        'allowedPaymentActions' => 'allowedPaymentActions'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'commerceCaseId' => 'setCommerceCaseId',
        'checkoutId' => 'setCheckoutId',
        'merchantCustomerId' => 'setMerchantCustomerId',
        'amountOfMoney' => 'setAmountOfMoney',
        'references' => 'setReferences',
        'shipping' => 'setShipping',
        'shoppingCart' => 'setShoppingCart',
        'paymentExecutions' => 'setPaymentExecutions',
        'checkoutStatus' => 'setCheckoutStatus',
        'statusOutput' => 'setStatusOutput',
        'paymentInformation' => 'setPaymentInformation',
        'creationDateTime' => 'setCreationDateTime',
        'allowedPaymentActions' => 'setAllowedPaymentActions'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'commerceCaseId' => 'getCommerceCaseId',
        'checkoutId' => 'getCheckoutId',
        'merchantCustomerId' => 'getMerchantCustomerId',
        'amountOfMoney' => 'getAmountOfMoney',
        'references' => 'getReferences',
        'shipping' => 'getShipping',
        'shoppingCart' => 'getShoppingCart',
        'paymentExecutions' => 'getPaymentExecutions',
        'checkoutStatus' => 'getCheckoutStatus',
        'statusOutput' => 'getStatusOutput',
        'paymentInformation' => 'getPaymentInformation',
        'creationDateTime' => 'getCreationDateTime',
        'allowedPaymentActions' => 'getAllowedPaymentActions'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('commerceCaseId', $data ?? [], null);
        $this->setIfExists('checkoutId', $data ?? [], null);
        $this->setIfExists('merchantCustomerId', $data ?? [], null);
        $this->setIfExists('amountOfMoney', $data ?? [], null);
        $this->setIfExists('references', $data ?? [], null);
        $this->setIfExists('shipping', $data ?? [], null);
        $this->setIfExists('shoppingCart', $data ?? [], null);
        $this->setIfExists('paymentExecutions', $data ?? [], null);
        $this->setIfExists('checkoutStatus', $data ?? [], null);
        $this->setIfExists('statusOutput', $data ?? [], null);
        $this->setIfExists('paymentInformation', $data ?? [], null);
        $this->setIfExists('creationDateTime', $data ?? [], null);
        $this->setIfExists('allowedPaymentActions', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['merchantCustomerId']) && (mb_strlen($this->container['merchantCustomerId']) > 20)) {
            $invalidProperties[] = "invalid value for 'merchantCustomerId', the character length must be smaller than or equal to 20.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets commerceCaseId
     *
     * @return string|null
     */
    public function getCommerceCaseId()
    {
        return $this->container['commerceCaseId'];
    }

    /**
     * Sets commerceCaseId
     *
     * @param string|null $commerceCaseId reference to the Commerce Case.
     *
     * @return self
     */
    public function setCommerceCaseId($commerceCaseId)
    {
        if (is_null($commerceCaseId)) {
            throw new \InvalidArgumentException('non-nullable commerceCaseId cannot be null');
        }
        $this->container['commerceCaseId'] = $commerceCaseId;

        return $this;
    }

    /**
     * Gets checkoutId
     *
     * @return string|null
     */
    public function getCheckoutId()
    {
        return $this->container['checkoutId'];
    }

    /**
     * Sets checkoutId
     *
     * @param string|null $checkoutId reference to the Checkout.
     *
     * @return self
     */
    public function setCheckoutId($checkoutId)
    {
        if (is_null($checkoutId)) {
            throw new \InvalidArgumentException('non-nullable checkoutId cannot be null');
        }
        $this->container['checkoutId'] = $checkoutId;

        return $this;
    }

    /**
     * Gets merchantCustomerId
     *
     * @return string|null
     */
    public function getMerchantCustomerId()
    {
        return $this->container['merchantCustomerId'];
    }

    /**
     * Sets merchantCustomerId
     *
     * @param string|null $merchantCustomerId Unique identifier for the customer.
     *
     * @return self
     */
    public function setMerchantCustomerId($merchantCustomerId)
    {
        if (is_null($merchantCustomerId)) {
            throw new \InvalidArgumentException('non-nullable merchantCustomerId cannot be null');
        }
        if ((mb_strlen($merchantCustomerId) > 20)) {
            throw new \InvalidArgumentException('invalid length for $merchantCustomerId when calling CheckoutResponse., must be smaller than or equal to 20.');
        }

        $this->container['merchantCustomerId'] = $merchantCustomerId;

        return $this;
    }

    /**
     * Gets amountOfMoney
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\AmountOfMoney|null
     */
    public function getAmountOfMoney()
    {
        return $this->container['amountOfMoney'];
    }

    /**
     * Sets amountOfMoney
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\AmountOfMoney|null $amountOfMoney amountOfMoney
     *
     * @return self
     */
    public function setAmountOfMoney($amountOfMoney)
    {
        if (is_null($amountOfMoney)) {
            throw new \InvalidArgumentException('non-nullable amountOfMoney cannot be null');
        }
        $this->container['amountOfMoney'] = $amountOfMoney;

        return $this;
    }

    /**
     * Gets references
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\CheckoutReferences|null
     */
    public function getReferences()
    {
        return $this->container['references'];
    }

    /**
     * Sets references
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\CheckoutReferences|null $references references
     *
     * @return self
     */
    public function setReferences($references)
    {
        if (is_null($references)) {
            throw new \InvalidArgumentException('non-nullable references cannot be null');
        }
        $this->container['references'] = $references;

        return $this;
    }

    /**
     * Gets shipping
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\Shipping|null
     */
    public function getShipping()
    {
        return $this->container['shipping'];
    }

    /**
     * Sets shipping
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\Shipping|null $shipping shipping
     *
     * @return self
     */
    public function setShipping($shipping)
    {
        if (is_null($shipping)) {
            throw new \InvalidArgumentException('non-nullable shipping cannot be null');
        }
        $this->container['shipping'] = $shipping;

        return $this;
    }

    /**
     * Gets shoppingCart
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\ShoppingCartResult|null
     */
    public function getShoppingCart()
    {
        return $this->container['shoppingCart'];
    }

    /**
     * Sets shoppingCart
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\ShoppingCartResult|null $shoppingCart shoppingCart
     *
     * @return self
     */
    public function setShoppingCart($shoppingCart)
    {
        if (is_null($shoppingCart)) {
            throw new \InvalidArgumentException('non-nullable shoppingCart cannot be null');
        }
        $this->container['shoppingCart'] = $shoppingCart;

        return $this;
    }

    /**
     * Gets paymentExecutions
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\PaymentExecution[]|null
     */
    public function getPaymentExecutions()
    {
        return $this->container['paymentExecutions'];
    }

    /**
     * Sets paymentExecutions
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\PaymentExecution[]|null $paymentExecutions paymentExecutions
     *
     * @return self
     */
    public function setPaymentExecutions($paymentExecutions)
    {
        if (is_null($paymentExecutions)) {
            throw new \InvalidArgumentException('non-nullable paymentExecutions cannot be null');
        }
        $this->container['paymentExecutions'] = $paymentExecutions;

        return $this;
    }

    /**
     * Gets checkoutStatus
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\StatusCheckout|null
     */
    public function getCheckoutStatus()
    {
        return $this->container['checkoutStatus'];
    }

    /**
     * Sets checkoutStatus
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\StatusCheckout|null $checkoutStatus checkoutStatus
     *
     * @return self
     */
    public function setCheckoutStatus($checkoutStatus)
    {
        if (is_null($checkoutStatus)) {
            throw new \InvalidArgumentException('non-nullable checkoutStatus cannot be null');
        }
        $this->container['checkoutStatus'] = $checkoutStatus;

        return $this;
    }

    /**
     * Gets statusOutput
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\StatusOutput|null
     */
    public function getStatusOutput()
    {
        return $this->container['statusOutput'];
    }

    /**
     * Sets statusOutput
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\StatusOutput|null $statusOutput statusOutput
     *
     * @return self
     */
    public function setStatusOutput($statusOutput)
    {
        if (is_null($statusOutput)) {
            throw new \InvalidArgumentException('non-nullable statusOutput cannot be null');
        }
        $this->container['statusOutput'] = $statusOutput;

        return $this;
    }

    /**
     * Gets paymentInformation
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\PaymentInformationResponse[]|null
     */
    public function getPaymentInformation()
    {
        return $this->container['paymentInformation'];
    }

    /**
     * Sets paymentInformation
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\PaymentInformationResponse[]|null $paymentInformation paymentInformation
     *
     * @return self
     */
    public function setPaymentInformation($paymentInformation)
    {
        if (is_null($paymentInformation)) {
            throw new \InvalidArgumentException('non-nullable paymentInformation cannot be null');
        }
        $this->container['paymentInformation'] = $paymentInformation;

        return $this;
    }

    /**
     * Gets creationDateTime
     *
     * @return \DateTime|null
     */
    public function getCreationDateTime()
    {
        return $this->container['creationDateTime'];
    }

    /**
     * Sets creationDateTime
     *
     * @param \DateTime|null $creationDateTime Creation date and time of the Checkout in RFC3339 format. It can either be provided in the request or otherwise will be automatically set to the time when the request CreateCommerceCase was received. Response values will always be in UTC time, but when providing this field in the requests, the time offset can have different formats.  Accepted formats are: * YYYY-MM-DD'T'HH:mm:ss'Z' * YYYY-MM-DD'T'HH:mm:ss+XX:XX * YYYY-MM-DD'T'HH:mm:ss-XX:XX * YYYY-MM-DD'T'HH:mm'Z' * YYYY-MM-DD'T'HH:mm+XX:XX * YYYY-MM-DD'T'HH:mm-XX:XX  All other formats may be ignored by the system.
     *
     * @return self
     */
    public function setCreationDateTime($creationDateTime)
    {
        if (is_null($creationDateTime)) {
            throw new \InvalidArgumentException('non-nullable creationDateTime cannot be null');
        }
        $this->container['creationDateTime'] = $creationDateTime;

        return $this;
    }

    /**
     * Gets allowedPaymentActions
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\AllowedPaymentActions[]|null
     */
    public function getAllowedPaymentActions()
    {
        return $this->container['allowedPaymentActions'];
    }

    /**
     * Sets allowedPaymentActions
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\AllowedPaymentActions[]|null $allowedPaymentActions allowedPaymentActions
     *
     * @return self
     */
    public function setAllowedPaymentActions($allowedPaymentActions)
    {
        if (is_null($allowedPaymentActions)) {
            throw new \InvalidArgumentException('non-nullable allowedPaymentActions cannot be null');
        }
        $this->container['allowedPaymentActions'] = $allowedPaymentActions;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}



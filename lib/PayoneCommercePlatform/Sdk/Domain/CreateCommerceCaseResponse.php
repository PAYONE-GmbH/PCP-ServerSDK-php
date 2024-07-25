<?php
/**
 * CreateCommerceCaseResponse
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

use ArrayAccess;
use PayoneCommercePlatform\Sdk\ObjectSerializer;

/**
 * CreateCommerceCaseResponse Class Doc Comment
 *
 * @category Class
 * @description The response contains references to the created Commerce case and the Checkout. It also contains the payment response if the flag &#39;autoExecuteOrder&#39; was set to true.
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateCommerceCaseResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreateCommerceCaseResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'commerceCaseId' => 'string',
        'merchantReference' => 'string',
        'customer' => '\PayoneCommercePlatform\Sdk\Domain\Customer',
        'checkout' => '\PayoneCommercePlatform\Sdk\Domain\CreateCheckoutResponse',
        'creationDateTime' => '\DateTime'
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
        'merchantReference' => null,
        'customer' => null,
        'checkout' => null,
        'creationDateTime' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'commerceCaseId' => false,
        'merchantReference' => false,
        'customer' => false,
        'checkout' => false,
        'creationDateTime' => false
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
        'merchantReference' => 'merchantReference',
        'customer' => 'customer',
        'checkout' => 'checkout',
        'creationDateTime' => 'creationDateTime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'commerceCaseId' => 'setCommerceCaseId',
        'merchantReference' => 'setMerchantReference',
        'customer' => 'setCustomer',
        'checkout' => 'setCheckout',
        'creationDateTime' => 'setCreationDateTime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'commerceCaseId' => 'getCommerceCaseId',
        'merchantReference' => 'getMerchantReference',
        'customer' => 'getCustomer',
        'checkout' => 'getCheckout',
        'creationDateTime' => 'getCreationDateTime'
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
        $this->setIfExists('merchantReference', $data ?? [], null);
        $this->setIfExists('customer', $data ?? [], null);
        $this->setIfExists('checkout', $data ?? [], null);
        $this->setIfExists('creationDateTime', $data ?? [], null);
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

        if (!is_null($this->container['merchantReference']) && (mb_strlen($this->container['merchantReference']) > 40)) {
            $invalidProperties[] = "invalid value for 'merchantReference', the character length must be smaller than or equal to 40.";
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
     * @param string|null $commerceCaseId Unique ID of the Commerce Case. It can used to add additional Checkouts to the Commerce Case.
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
     * Gets merchantReference
     *
     * @return string|null
     */
    public function getMerchantReference()
    {
        return $this->container['merchantReference'];
    }

    /**
     * Sets merchantReference
     *
     * @param string|null $merchantReference Unique reference of the Commerce Case that is also returned for reporting and reconciliation purposes.
     *
     * @return self
     */
    public function setMerchantReference($merchantReference)
    {
        if (is_null($merchantReference)) {
            throw new \InvalidArgumentException('non-nullable merchantReference cannot be null');
        }
        if ((mb_strlen($merchantReference) > 40)) {
            throw new \InvalidArgumentException('invalid length for $merchantReference when calling CreateCommerceCaseResponse., must be smaller than or equal to 40.');
        }

        $this->container['merchantReference'] = $merchantReference;

        return $this;
    }

    /**
     * Gets customer
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\Customer|null
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\Customer|null $customer customer
     *
     * @return self
     */
    public function setCustomer($customer)
    {
        if (is_null($customer)) {
            throw new \InvalidArgumentException('non-nullable customer cannot be null');
        }
        $this->container['customer'] = $customer;

        return $this;
    }

    /**
     * Gets checkout
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\CreateCheckoutResponse|null
     */
    public function getCheckout()
    {
        return $this->container['checkout'];
    }

    /**
     * Sets checkout
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\CreateCheckoutResponse|null $checkout checkout
     *
     * @return self
     */
    public function setCheckout($checkout)
    {
        if (is_null($checkout)) {
            throw new \InvalidArgumentException('non-nullable checkout cannot be null');
        }
        $this->container['checkout'] = $checkout;

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

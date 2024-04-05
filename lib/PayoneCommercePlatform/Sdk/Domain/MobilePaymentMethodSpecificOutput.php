<?php
/**
 * MobilePaymentMethodSpecificOutput
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
 * MobilePaymentMethodSpecificOutput Class Doc Comment
 *
 * @category Class
 * @description Object containing the mobile payment method details.
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class MobilePaymentMethodSpecificOutput implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'MobilePaymentMethodSpecificOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'paymentProductId' => 'int',
        'authorisationCode' => 'string',
        'fraudResults' => '\PayoneCommercePlatform\Sdk\Domain\CardFraudResults',
        'threeDSecureResults' => '\PayoneCommercePlatform\Sdk\Domain\ThreeDSecureResults',
        'network' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'paymentProductId' => 'int32',
        'authorisationCode' => null,
        'fraudResults' => null,
        'threeDSecureResults' => null,
        'network' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'paymentProductId' => false,
        'authorisationCode' => false,
        'fraudResults' => false,
        'threeDSecureResults' => false,
        'network' => false
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
        'paymentProductId' => 'paymentProductId',
        'authorisationCode' => 'authorisationCode',
        'fraudResults' => 'fraudResults',
        'threeDSecureResults' => 'threeDSecureResults',
        'network' => 'network'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'paymentProductId' => 'setPaymentProductId',
        'authorisationCode' => 'setAuthorisationCode',
        'fraudResults' => 'setFraudResults',
        'threeDSecureResults' => 'setThreeDSecureResults',
        'network' => 'setNetwork'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'paymentProductId' => 'getPaymentProductId',
        'authorisationCode' => 'getAuthorisationCode',
        'fraudResults' => 'getFraudResults',
        'threeDSecureResults' => 'getThreeDSecureResults',
        'network' => 'getNetwork'
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
        $this->setIfExists('paymentProductId', $data ?? [], null);
        $this->setIfExists('authorisationCode', $data ?? [], null);
        $this->setIfExists('fraudResults', $data ?? [], null);
        $this->setIfExists('threeDSecureResults', $data ?? [], null);
        $this->setIfExists('network', $data ?? [], null);
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

        if (!is_null($this->container['paymentProductId']) && ($this->container['paymentProductId'] > 99999)) {
            $invalidProperties[] = "invalid value for 'paymentProductId', must be smaller than or equal to 99999.";
        }

        if (!is_null($this->container['paymentProductId']) && ($this->container['paymentProductId'] < 0)) {
            $invalidProperties[] = "invalid value for 'paymentProductId', must be bigger than or equal to 0.";
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
     * Gets paymentProductId
     *
     * @return int|null
     */
    public function getPaymentProductId()
    {
        return $this->container['paymentProductId'];
    }

    /**
     * Sets paymentProductId
     *
     * @param int|null $paymentProductId Payment product identifier - please check product documentation for a full overview of possible values.
     *
     * @return self
     */
    public function setPaymentProductId($paymentProductId)
    {
        if (is_null($paymentProductId)) {
            throw new \InvalidArgumentException('non-nullable paymentProductId cannot be null');
        }

        if (($paymentProductId > 99999)) {
            throw new \InvalidArgumentException('invalid value for $paymentProductId when calling MobilePaymentMethodSpecificOutput., must be smaller than or equal to 99999.');
        }
        if (($paymentProductId < 0)) {
            throw new \InvalidArgumentException('invalid value for $paymentProductId when calling MobilePaymentMethodSpecificOutput., must be bigger than or equal to 0.');
        }

        $this->container['paymentProductId'] = $paymentProductId;

        return $this;
    }

    /**
     * Gets authorisationCode
     *
     * @return string|null
     */
    public function getAuthorisationCode()
    {
        return $this->container['authorisationCode'];
    }

    /**
     * Sets authorisationCode
     *
     * @param string|null $authorisationCode Card Authorization code as returned by the acquirer
     *
     * @return self
     */
    public function setAuthorisationCode($authorisationCode)
    {
        if (is_null($authorisationCode)) {
            throw new \InvalidArgumentException('non-nullable authorisationCode cannot be null');
        }
        $this->container['authorisationCode'] = $authorisationCode;

        return $this;
    }

    /**
     * Gets fraudResults
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\CardFraudResults|null
     */
    public function getFraudResults()
    {
        return $this->container['fraudResults'];
    }

    /**
     * Sets fraudResults
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\CardFraudResults|null $fraudResults fraudResults
     *
     * @return self
     */
    public function setFraudResults($fraudResults)
    {
        if (is_null($fraudResults)) {
            throw new \InvalidArgumentException('non-nullable fraudResults cannot be null');
        }
        $this->container['fraudResults'] = $fraudResults;

        return $this;
    }

    /**
     * Gets threeDSecureResults
     *
     * @return \PayoneCommercePlatform\Sdk\Domain\ThreeDSecureResults|null
     */
    public function getThreeDSecureResults()
    {
        return $this->container['threeDSecureResults'];
    }

    /**
     * Sets threeDSecureResults
     *
     * @param \PayoneCommercePlatform\Sdk\Domain\ThreeDSecureResults|null $threeDSecureResults threeDSecureResults
     *
     * @return self
     */
    public function setThreeDSecureResults($threeDSecureResults)
    {
        if (is_null($threeDSecureResults)) {
            throw new \InvalidArgumentException('non-nullable threeDSecureResults cannot be null');
        }
        $this->container['threeDSecureResults'] = $threeDSecureResults;

        return $this;
    }

    /**
     * Gets network
     *
     * @return string|null
     */
    public function getNetwork()
    {
        return $this->container['network'];
    }

    /**
     * Sets network
     *
     * @param string|null $network The card network that was used for a mobile payment method operation
     *
     * @return self
     */
    public function setNetwork($network)
    {
        if (is_null($network)) {
            throw new \InvalidArgumentException('non-nullable network cannot be null');
        }
        $this->container['network'] = $network;

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



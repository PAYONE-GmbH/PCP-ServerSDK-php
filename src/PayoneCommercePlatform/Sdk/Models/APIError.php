<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class APIError
{
    /**
     * @var string Error code
     */
    #[SerializedName('errorCode')]
    protected string $errorCode;

    /**
     * @var string|null Category the error belongs to. The category should give an indication of the type of error you are dealing with. Possible values:
     * DIRECT_PLATFORM_ERROR - indicating that a functional error has occurred in the platform.
     * PAYMENT_PLATFORM_ERROR - indicating that a functional error has occurred in the payment platform.
     * IO_ERROR - indicating that a technical error has occurred within the payment platform or between the
     * payment platform and third party systems.
     * COMMERCE_PLATFORM_ERROR - indicating an error originating from the Commerce Platform.
     * COMMERCE_PORTAL_BACKEND_ERROR - indicating an error originating from the Commerce Portal Backend.
     */
    #[SerializedName('category')]
    protected ?string $category;

    /**
     * @var int|null HTTP status code for this error that can be used to determine the type of error
     */
    #[SerializedName('httpStatusCode')]
    protected ?int $httpStatusCode;

    /**
     * @var string|null ID of the error. This is a short human-readable message that briefly describes the error.
     */
    #[SerializedName('id')]
    protected ?string $id;

    /**
     * @var string|null Human-readable error message that is not meant to be relayed to customer as it might tip off people who are trying to commit fraud
     */
    #[SerializedName('message')]
    protected ?string $message;

    /**
     * @var string|null Returned only if the error relates to a value that was missing or incorrect. Contains a location path to the value as a JSonata query.
     * Some common examples:
     * a.b selects the value of property b of root property a,
     * a[1] selects the first element of the array in root property a,
     * a[b='some value'] selects all elements of the array in root property a that have a property b with value 'some value'.
     */
    #[SerializedName('propertyName')]
    protected ?string $propertyName;

    public function __construct(
        string $errorCode,
        ?string $category = null,
        ?int $httpStatusCode = null,
        ?string $id = null,
        ?string $message = null,
        ?string $propertyName = null
    ) {
        $this->errorCode = $errorCode;
        $this->category = $category;
        $this->httpStatusCode = $httpStatusCode;
        $this->id = $id;
        $this->message = $message;
        $this->propertyName = $propertyName;
    }

    // Getters and Setters
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    public function setErrorCode(string $errorCode): self
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function getHttpStatusCode(): ?int
    {
        return $this->httpStatusCode;
    }

    public function setHttpStatusCode(?int $httpStatusCode): self
    {
        $this->httpStatusCode = $httpStatusCode;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getPropertyName(): ?string
    {
        return $this->propertyName;
    }

    public function setPropertyName(?string $propertyName): self
    {
        $this->propertyName = $propertyName;
        return $this;
    }
}

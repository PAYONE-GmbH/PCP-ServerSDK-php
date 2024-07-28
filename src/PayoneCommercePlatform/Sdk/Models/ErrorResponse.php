<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\APIError;

/**
 * @description Object representing an error response.
 */
class ErrorResponse
{
    /**
     * @var string|null Unique reference of this error response for debugging purposes.
     */
    #[SerializedName('errorId')]
    protected ?string $errorId;

    /**
     * @var APIError[]|null List of errors.
     */
    #[SerializedName('errors')]
    protected ?array $errors;

    /**
     * @param string|null $errorId Unique reference of this error response for debugging purposes.
     * @param APIError[]|null $errors List of errors.
     */
    public function __construct(
        ?string $errorId = null,
        ?array $errors = null
    ) {
        $this->errorId = $errorId;
        $this->errors = $errors;
    }

    // Getters and Setters
    public function getErrorId(): ?string
    {
        return $this->errorId;
    }

    public function setErrorId(?string $errorId): self
    {
        $this->errorId = $errorId;
        return $this;
    }

    /**
     * @return APIError[]|null List of errors.
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param APIError[]|null $errors List of errors.
     * @return self
     */
    public function setErrors(?array $errors): self
    {
        $this->errors = $errors;
        return $this;
    }
}

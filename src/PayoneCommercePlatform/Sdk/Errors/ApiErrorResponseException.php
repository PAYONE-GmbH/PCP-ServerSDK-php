<?php

namespace PayoneCommercePlatform\Sdk\Errors;

use PayoneCommercePlatform\Sdk\Errors\ApiException;
use PayoneCommercePlatform\Sdk\Domain\APIError;
use Throwable;

class ApiErrorResponseException extends ApiException
{
    /**
     * Errors reported by the Api
     *
     * @var APIError[]
     */
    protected array $errors;

    /**
     * Constructor
     *
     * @param int                   $statusCode      HTTP status code
     * @param string                $responseBody    HTTP decoded body of the server response as string
     * @param APIError[]            $errors          Errors send by the api
     * @param ?string               $message         Custom error message
     * @param Throwable|null        $previous        The previous throwable used for the exception chaining.
     */
    public function __construct(
        int $statusCode,
        string $responseBody,
        array $errors,
        ?string $message = null,
        ?Throwable $previous = null,
    ) {
        parent::__construct($statusCode, $responseBody, $message, $previous);
        $this->errors = $errors;
    }

    /**
     * Gets the Errors send by the api.
     *
     * @return APIError[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}

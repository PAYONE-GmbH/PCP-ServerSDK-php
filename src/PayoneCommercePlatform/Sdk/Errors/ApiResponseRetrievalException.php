<?php

namespace PayoneCommercePlatform\Sdk\Errors;

use PayoneCommercePlatform\Sdk\Errors\ApiException;
use Throwable;

/**
 * ApiException Class Doc Comment
 *
 * @category Class
 * @package  PayoneCommercePlatform\Sdk\Errors
 */
class ApiResponseRetrievalException extends ApiException
{
    /**
     * Constructor
     *
     * @param int                   $statusCode      HTTP status code
     * @param string                $responseBody    HTTP decoded body of the server response as string
     * @param ?string               $message         Custom error message
     * @param Throwable|null        $previous        The previous throwable used for the exception chaining.
     */
    public function __construct(
        int $statusCode,
        string $responseBody,
        ?string $message = null,
        ?Throwable $previous = null,
    ) {
        parent::__construct(statusCode: $statusCode, responseBody: $responseBody, message: $message, previous: $previous);
    }
}

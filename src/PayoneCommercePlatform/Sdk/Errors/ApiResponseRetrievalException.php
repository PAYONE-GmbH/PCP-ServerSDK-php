<?php

namespace PayoneCommercePlatform\Sdk\Errors;

use PayoneCommercePlatform\Sdk\Errors\ApiException;
use Throwable;

class ApiResponseRetrievalException extends ApiException
{
    /**
     * Constructor
     *
     * @param int                   $statusCode      HTTP status code
     * @param string                $uri             The URI of the request
     * @param string                $httpMethod      The HTTP method of the request
     * @param string                $responseBody    HTTP decoded body of the server response as string
     * @param ?string               $message         Custom error message
     * @param Throwable|null        $previous        The previous throwable used for the exception chaining.
     */
    public function __construct(
        int $statusCode,
        string $uri,
        string $httpMethod,
        string $responseBody,
        ?string $message = null,
        ?Throwable $previous = null,
    ) {
        parent::__construct(
            statusCode: $statusCode,
            uri: $uri,
            httpMethod: $httpMethod,
            responseBody: $responseBody,
            message: $message,
            previous: $previous
        );
    }
}

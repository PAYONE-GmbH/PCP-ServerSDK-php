<?php

namespace PayoneCommercePlatform\Sdk\Errors;

use Exception;
use Throwable;

class ApiException extends Exception
{
    /**
     * The URI of the request
     *
     * @var string
     */
    protected string $uri;

    /**
     * The HTTP method of the request
     *
     * @var string
     */
    protected string $httpMethod;
    /**
     * The HTTP body of the server response as string
     *
     * @var string
     */
    protected ?string $responseBody;

    /**
     * The HTTP status code send by the server
     *
     * @var int
     */
    protected int $statusCode;

    /**
     * Constructor
     *
     * @param int                   $statusCode      HTTP status code
     * @param string                $uri             The URI of the request
     * @param string                $httpMethod      The HTTP method of the request
     * @param string|null           $responseBody    HTTP decoded body of the server response as string
     * @param string|null           $message         Custom error message
     * @param Throwable|null        $previous        The previous throwable used for the exception chaining.
     */
    public function __construct(
        int $statusCode,
        string $uri,
        string $httpMethod,
        ?string $responseBody = null,
        ?string $message = null,
        ?Throwable $previous = null,
    ) {
        if ($message === null) {
            $message = sprintf('[%d] Error communicating with the API', $statusCode);
        }
        parent::__construct($message, $statusCode, $previous);
        $this->uri = $uri;
        $this->httpMethod = $httpMethod;
        $this->statusCode = $statusCode;
        $this->responseBody = $responseBody;
    }

    /**
     * Gets the HTTP status send by the server
     *
     * @return int status code
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Gets the URI of the request
     *
     * @return string URI of the request
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * Gets the HTTP method of the request
     *
     * @return string HTTP method of the request
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * Gets the HTTP body of the server response either as Json or string
     *
     * @return string HTTP body of the server response either as \stdClass or string
     */
    public function getResponseBody(): ?string
    {
        return $this->responseBody;
    }
}

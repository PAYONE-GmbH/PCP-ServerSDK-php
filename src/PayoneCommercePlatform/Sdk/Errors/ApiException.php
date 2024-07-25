<?php

namespace PayoneCommercePlatform\Sdk\Errors;

use Exception;
use Throwable;

/**
 * ApiException Class Doc Comment
 *
 * @category Class
 * @package  PayoneCommercePlatform\Sdk\Errors
 */
class ApiException extends Exception
{
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
     * @param string|null           $responseBody    HTTP decoded body of the server response as string
     * @param string|null           $message         Custom error message
     * @param Throwable|null        $previous        The previous throwable used for the exception chaining.
     */
    public function __construct(
        int $statusCode,
        ?string $responseBody = null,
        ?string $message = null,
        ?Throwable $previous = null,
    ) {
        if ($message === null) {
            $message = sprintf('[%d] Error communicating with the API', $statusCode);
        }
        parent::__construct($message, $statusCode, $previous);
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
     * Gets the HTTP body of the server response either as Json or string
     *
     * @return string HTTP body of the server response either as \stdClass or string
     */
    public function getResponseBody(): ?string
    {
        return $this->responseBody;
    }
}

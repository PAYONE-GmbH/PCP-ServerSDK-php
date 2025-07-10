<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\Models\AuthenticationToken;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;

class AuthenticationApiClient extends BaseApiClient
{
    protected const AUTH_TOKENS_URI = '/v1/{merchantId}/authentication-tokens';

    /**
     * Retrieve a short-lived authentication JWT token for your merchant.
     *
     * @param string $merchantId
     * @param string|null $xRequestId Optional X-Request-ID header for tracing requests.
     * @throws ApiErrorResponseException|ApiResponseRetrievalException
     * @return AuthenticationToken
     */
    public function getAuthenticationTokens(string $merchantId, ?string $xRequestId = null): AuthenticationToken
    {
        $request = $this->getAuthenticationTokensRequest($merchantId, $xRequestId);
        return $this->makeApiCall($request, AuthenticationToken::class)[0];
    }

    /**
     * Create request for operation 'getAuthenticationTokens'
     *
     * @param string $merchantId
     * @param string|null $xRequestId
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getAuthenticationTokensRequest(string $merchantId, ?string $xRequestId = null): Request
    {
        $resourcePath = self::AUTH_TOKENS_URI;
        $resourcePath = str_replace('{merchantId}', rawurlencode($merchantId), $resourcePath);

        $headers = ['Content-Type' => self::MEDIA_TYPE_JSON];
        if ($xRequestId !== null) {
            $headers['X-Request-ID'] = $xRequestId;
        }

        $operationHost = $this->config->getHost();
        return new Request(
            'GET',
            $operationHost . $resourcePath,
            $headers
        );
    }
}

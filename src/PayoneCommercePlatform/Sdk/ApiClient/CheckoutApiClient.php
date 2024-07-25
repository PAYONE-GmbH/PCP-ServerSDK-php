<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise\PromiseInterface;
use PayoneCommercePlatform\Sdk\Domain\CheckoutResponse;
use PayoneCommercePlatform\Sdk\Domain\CreateCheckoutResponse;
use PayoneCommercePlatform\Sdk\Domain\PatchCheckoutRequest;
use PayoneCommercePlatform\Sdk\Domain\CheckoutsResponse;
use PayoneCommercePlatform\Sdk\ObjectSerializer;
use PayoneCommercePlatform\Sdk\Domain\CreateCheckoutRequest;

/**
 * CheckoutApi Class Doc Comment
 *
 * @category Class
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class CheckoutApiClient extends BaseApiClient
{
    /**
     * Operation createCheckout
     *
     * Add a Checkout to an existing Commerce Case
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CreateCheckoutRequest $createCheckoutRequest createCheckoutRequest (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\CreateCheckoutResponse
     */
    public function createCheckout(string $merchantId, string $commerceCaseId, CreateCheckoutRequest $createCheckoutRequest): CreateCheckoutResponse
    {
        $request = $this->createCheckoutRequest($merchantId, $commerceCaseId, $createCheckoutRequest);

        list($response) = $this->makeApiCall($request, CreateCheckoutResponse::class);
        return $response;
    }

    /**
     * Operation createCheckoutAsync
     *
     * Add a Checkout to an existing Commerce Case
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CreateCheckoutRequest $createCheckoutRequest (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createCheckoutAsync(string $merchantId, string $commerceCaseId, CreateCheckoutRequest $createCheckoutRequest): PromiseInterface
    {
        $request = $this->createCheckoutRequest($merchantId, $commerceCaseId, $createCheckoutRequest);

        return $this->makeAsyncApiCall($request, CreateCheckoutResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'createCheckout'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\CreateCheckoutRequest $createCheckoutRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createCheckoutRequest(
        string $merchantId,
        string $commerceCaseId,
        CreateCheckoutRequest $createCheckoutRequest,
    ): Request {
        $contentType = 'application/json';
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            ObjectSerializer::toPathValue($commerceCaseId),
            $resourcePath
        );


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($createCheckoutRequest));

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody,
        );
    }

    /**
     * Operation deleteCheckout
     *
     * Delete a Checkout
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteCheckout(string $merchantId, string $commerceCaseId, string $checkoutId): void
    {
        $request = $this->deleteCheckoutRequest($merchantId, $commerceCaseId, $checkoutId);

        $this->makeApiCall($request, null);
    }

    /**
     * Operation deleteCheckoutAsync
     *
     * Delete a Checkout
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteCheckoutAsync(string $merchantId, string $commerceCaseId, string $checkoutId): PromiseInterface
    {
        $request = $this->createCheckoutRequest($merchantId, $commerceCaseId, $checkoutId);

        return $this->makeAsyncApiCall($merchantId, $commerceCaseId, $checkoutId)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'deleteCheckout'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteCheckoutRequest(string $merchantId, string $commerceCaseId, string $checkoutId): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}';
        $contentType = 'application/json';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );
        // path params
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            ObjectSerializer::toPathValue($commerceCaseId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'checkoutId' . '}',
            ObjectSerializer::toPathValue($checkoutId),
            $resourcePath
        );

        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
        );
    }

    /**
     * Operation getCheckout
     *
     * Get Checkout Details
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\CheckoutResponse
     */
    public function getCheckout(string $merchantId, string $commerceCaseId, string $checkoutId): CheckoutResponse
    {
        $request = $this->getCheckoutRequest($merchantId, $commerceCaseId, $checkoutId);

        list($response) = $this->makeApiCall($request, CheckoutResponse::class);
        return $response;
    }

    /**
     * Operation getCheckoutAsync
     *
     * Get Checkout Details
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCheckoutAsync(string $merchantId, string $commerceCaseId, string $checkoutId): PromiseInterface
    {
        $request = $this->getCheckoutRequest($merchantId, $commerceCaseId, $checkoutId);

        return $this->makeAsyncApiCall($request, CheckoutResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'getCheckout'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getCheckoutRequest(string $merchantId, string $commerceCaseId, string $checkoutId): Request
    {

        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}';
        $contentType = 'application/json';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $multipart = false;

        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            ObjectSerializer::toPathValue($commerceCaseId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'checkoutId' . '}',
            ObjectSerializer::toPathValue($checkoutId),
            $resourcePath
        );


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
        );
    }

    /**
     * Operation getCheckouts
     *
     * Get a list of Checkouts based on Search Parameters
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  int $offset The offset to load Checkouts starting with 0 (optional, default to 0)
     * @param  int $size The number of Checkouts loaded per page (optional, default to 25)
     * @param  \DateTime $fromDate Date and time in RFC3339 format after which Checkouts should be included in the request. Accepted formats are: * YYYY-MM-DD&#39;T&#39;HH:mm:ss&#39;Z&#39; * YYYY-MM-DD&#39;T&#39;HH:mm:ss+XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm:ss-XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm&#39;Z&#39; * YYYY-MM-DD&#39;T&#39;HH:mm+XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm-XX:XX          All other formats may be ignored by the system. (optional)
     * @param  \DateTime $toDate Date and time in RFC3339 format after which Checkouts should be included in the request. Accepted formats are: * YYYY-MM-DD&#39;T&#39;HH:mm:ss&#39;Z&#39; * YYYY-MM-DD&#39;T&#39;HH:mm:ss+XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm:ss-XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm&#39;Z&#39; * YYYY-MM-DD&#39;T&#39;HH:mm+XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm-XX:XX All other formats may be ignored by the system. (optional)
     * @param  int $fromCheckoutAmount Minimum monetary value of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toCheckoutAmount Maximum monetary value of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromOpenAmount Minimum open amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toOpenAmount Maximum open amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromCollectedAmount Minimum collected amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toCollectedAmount Maximum collected amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromCancelledAmount Minimum cancelled amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toCancelledAmount Maximum cancelled amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromRefundAmount Minimum refund amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toRefundAmount Maximum refund amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromChargebackAmount Minimum chargeback amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toChargebackAmount Maximum chargeback amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  string $checkoutId Unique identifier of a Checkout (optional)
     * @param  string $merchantReference Unique reference of the Checkout that is also returned for reporting and reconciliation purposes. (optional)
     * @param  string $merchantCustomerId Unique identifier for the customer. (optional)
     * @param  int[] $includePaymentProductId Filter your results by payment product ID so that only Checkouts containing a Payment Execution with one of the specified payment product IDs are returned. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\StatusCheckout[] $includeCheckoutStatus Filter your results by Checkout status so that only Checkouts with the specified statuses are returned. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\ExtendedCheckoutStatus[] $includeExtendedCheckoutStatus Filter your results by extended Checkout status so that only Commerce Cases with Checkouts with the specified statuses are returned. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\PaymentChannel[] $includePaymentChannel Filter your results by payment channel so that only Checkouts which reference transactions on the given channels are returned. (optional)
     * @param  string $paymentReference Filter your results by the merchantReference of the paymentExecution or paymentInformation. (optional)
     * @param  string $paymentId Filter your results by the paymentExecutionId, paymentInformationId or the id of the payment. (optional)
     * @param  string $firstName Filter your results by the customer first name. It is also possible to filter by the first name from the shipping address. (optional)
     * @param  string $surname Filter your results by the customer surname. It is also possible to filter by the surname from the shipping address. (optional)
     * @param  string $email Filter your results by the customer email address. (optional)
     * @param  string $phoneNumber Filter your results by the customer phone number. (optional)
     * @param  string $dateOfBirth Filter your results by the date of birth. Format YYYYMMDD (optional)
     * @param  string $companyInformation Filter your results by the name of the company. (optional)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return \PayoneCommercePlatform\Sdk\Domain\CheckoutsResponse
     */
    public function getCheckouts(
        string $merchantId,
        int $offset = 0,
        int $size = 25,
        \DateTime $fromDate = null,
        \DateTime $toDate = null,
        int $fromCheckoutAmount = null,
        int $toCheckoutAmount = null,
        int $fromOpenAmount = null,
        int $toOpenAmount = null,
        int $fromCollectedAmount = null,
        int $toCollectedAmount = null,
        int $fromCancelledAmount = null,
        int $toCancelledAmount = null,
        int $fromRefundAmount = null,
        int $toRefundAmount = null,
        int $fromChargebackAmount = null,
        int $toChargebackAmount = null,
        string $checkoutId = null,
        string $merchantReference = null,
        string $merchantCustomerId = null,
        array $includePaymentProductId = null,
        array $includeCheckoutStatus = null,
        array $includeExtendedCheckoutStatus = null,
        array $includePaymentChannel = null,
        string $paymentReference = null,
        string $paymentId = null,
        string $firstName = null,
        string $surname = null,
        string $email = null,
        string $phoneNumber = null,
        string $dateOfBirth = null,
        string $companyInformation = null,
    ): CheckoutsResponse {
        $request = $this->getCheckoutsRequest($merchantId, $offset, $size, $fromDate, $toDate, $fromCheckoutAmount, $toCheckoutAmount, $fromOpenAmount, $toOpenAmount, $fromCollectedAmount, $toCollectedAmount, $fromCancelledAmount, $toCancelledAmount, $fromRefundAmount, $toRefundAmount, $fromChargebackAmount, $toChargebackAmount, $checkoutId, $merchantReference, $merchantCustomerId, $includePaymentProductId, $includeCheckoutStatus, $includeExtendedCheckoutStatus, $includePaymentChannel, $paymentReference, $paymentId, $firstName, $surname, $email, $phoneNumber, $dateOfBirth, $companyInformation);
        list($response) = $this->makeApiCall($request, CheckoutsResponse::class);
        return $response;
    }

    /**
     * Operation getCheckoutsAsync
     *
     * Get a list of Checkouts based on Search Parameters
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  int $offset The offset to load Checkouts starting with 0 (optional, default to 0)
     * @param  int $size The number of Checkouts loaded per page (optional, default to 25)
     * @param  \DateTime $fromDate Date and time in RFC3339 format after which Checkouts should be included in the request. Accepted formats are: * YYYY-MM-DD&#39;T&#39;HH:mm:ss&#39;Z&#39; * YYYY-MM-DD&#39;T&#39;HH:mm:ss+XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm:ss-XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm&#39;Z&#39; * YYYY-MM-DD&#39;T&#39;HH:mm+XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm-XX:XX          All other formats may be ignored by the system. (optional)
     * @param  \DateTime $toDate Date and time in RFC3339 format after which Checkouts should be included in the request. Accepted formats are: * YYYY-MM-DD&#39;T&#39;HH:mm:ss&#39;Z&#39; * YYYY-MM-DD&#39;T&#39;HH:mm:ss+XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm:ss-XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm&#39;Z&#39; * YYYY-MM-DD&#39;T&#39;HH:mm+XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm-XX:XX All other formats may be ignored by the system. (optional)
     * @param  int $fromCheckoutAmount Minimum monetary value of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toCheckoutAmount Maximum monetary value of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromOpenAmount Minimum open amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toOpenAmount Maximum open amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromCollectedAmount Minimum collected amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toCollectedAmount Maximum collected amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromCancelledAmount Minimum cancelled amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toCancelledAmount Maximum cancelled amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromRefundAmount Minimum refund amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toRefundAmount Maximum refund amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromChargebackAmount Minimum chargeback amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toChargebackAmount Maximum chargeback amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  string $checkoutId Unique identifier of a Checkout (optional)
     * @param  string $merchantReference Unique reference of the Checkout that is also returned for reporting and reconciliation purposes. (optional)
     * @param  string $merchantCustomerId Unique identifier for the customer. (optional)
     * @param  int[] $includePaymentProductId Filter your results by payment product ID so that only Checkouts containing a Payment Execution with one of the specified payment product IDs are returned. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\StatusCheckout[] $includeCheckoutStatus Filter your results by Checkout status so that only Checkouts with the specified statuses are returned. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\ExtendedCheckoutStatus[] $includeExtendedCheckoutStatus Filter your results by extended Checkout status so that only Commerce Cases with Checkouts with the specified statuses are returned. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\PaymentChannel[] $includePaymentChannel Filter your results by payment channel so that only Checkouts which reference transactions on the given channels are returned. (optional)
     * @param  string $paymentReference Filter your results by the merchantReference of the paymentExecution or paymentInformation. (optional)
     * @param  string $paymentId Filter your results by the paymentExecutionId, paymentInformationId or the id of the payment. (optional)
     * @param  string $firstName Filter your results by the customer first name. It is also possible to filter by the first name from the shipping address. (optional)
     * @param  string $surname Filter your results by the customer surname. It is also possible to filter by the surname from the shipping address. (optional)
     * @param  string $email Filter your results by the customer email address. (optional)
     * @param  string $phoneNumber Filter your results by the customer phone number. (optional)
     * @param  string $dateOfBirth Filter your results by the date of birth. Format YYYYMMDD (optional)
     * @param  string $companyInformation Filter your results by the name of the company. (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCheckoutsAsync(
        string $merchantId,
        ?int $offset = 0,
        ?int $size = 25,
        ?\DateTime $fromDate = null,
        ?\DateTime $toDate = null,
        ?int $fromCheckoutAmount = null,
        ?int $toCheckoutAmount = null,
        ?int $fromOpenAmount = null,
        ?int $toOpenAmount = null,
        ?int $fromCollectedAmount = null,
        ?int $toCollectedAmount = null,
        ?int $fromCancelledAmount = null,
        ?int $toCancelledAmount = null,
        ?int $fromRefundAmount = null,
        ?int $toRefundAmount = null,
        ?int $fromChargebackAmount = null,
        ?int $toChargebackAmount = null,
        ?string $checkoutId = null,
        ?string $merchantReference = null,
        ?string $merchantCustomerId = null,
        ?array $includePaymentProductId = null,
        ?array $includeCheckoutStatus = null,
        ?array $includeExtendedCheckoutStatus = null,
        ?array $includePaymentChannel = null,
        ?string $paymentReference = null,
        ?string $paymentId = null,
        ?string $firstName = null,
        ?string $surname = null,
        ?string $email = null,
        ?string $phoneNumber = null,
        ?string $dateOfBirth = null,
        ?string $companyInformation = null,
    ): PromiseInterface {
        $request = $this->getCheckoutsRequest($merchantId, $offset, $size, $fromDate, $toDate, $fromCheckoutAmount, $toCheckoutAmount, $fromOpenAmount, $toOpenAmount, $fromCollectedAmount, $toCollectedAmount, $fromCancelledAmount, $toCancelledAmount, $fromRefundAmount, $toRefundAmount, $fromChargebackAmount, $toChargebackAmount, $checkoutId, $merchantReference, $merchantCustomerId, $includePaymentProductId, $includeCheckoutStatus, $includeExtendedCheckoutStatus, $includePaymentChannel, $paymentReference, $paymentId, $firstName, $surname, $email, $phoneNumber, $dateOfBirth, $companyInformation);

        return $this->makeAsyncApiCall($request, CheckoutsResponse::class)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'getCheckouts'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  int $offset The offset to load Checkouts starting with 0 (optional, default to 0)
     * @param  int $size The number of Checkouts loaded per page (optional, default to 25)
     * @param  \DateTime $fromDate Date and time in RFC3339 format after which Checkouts should be included in the request. Accepted formats are: * YYYY-MM-DD&#39;T&#39;HH:mm:ss&#39;Z&#39; * YYYY-MM-DD&#39;T&#39;HH:mm:ss+XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm:ss-XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm&#39;Z&#39; * YYYY-MM-DD&#39;T&#39;HH:mm+XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm-XX:XX          All other formats may be ignored by the system. (optional)
     * @param  \DateTime $toDate Date and time in RFC3339 format after which Checkouts should be included in the request. Accepted formats are: * YYYY-MM-DD&#39;T&#39;HH:mm:ss&#39;Z&#39; * YYYY-MM-DD&#39;T&#39;HH:mm:ss+XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm:ss-XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm&#39;Z&#39; * YYYY-MM-DD&#39;T&#39;HH:mm+XX:XX * YYYY-MM-DD&#39;T&#39;HH:mm-XX:XX All other formats may be ignored by the system. (optional)
     * @param  int $fromCheckoutAmount Minimum monetary value of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toCheckoutAmount Maximum monetary value of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromOpenAmount Minimum open amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toOpenAmount Maximum open amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromCollectedAmount Minimum collected amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toCollectedAmount Maximum collected amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromCancelledAmount Minimum cancelled amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toCancelledAmount Maximum cancelled amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromRefundAmount Minimum refund amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toRefundAmount Maximum refund amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $fromChargebackAmount Minimum chargeback amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  int $toChargebackAmount Maximum chargeback amount of the Checkouts that shall be included in the response. Amount in cents always having 2 decimals. (optional)
     * @param  string $checkoutId Unique identifier of a Checkout (optional)
     * @param  string $merchantReference Unique reference of the Checkout that is also returned for reporting and reconciliation purposes. (optional)
     * @param  string $merchantCustomerId Unique identifier for the customer. (optional)
     * @param  int[] $includePaymentProductId Filter your results by payment product ID so that only Checkouts containing a Payment Execution with one of the specified payment product IDs are returned. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\StatusCheckout[] $includeCheckoutStatus Filter your results by Checkout status so that only Checkouts with the specified statuses are returned. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\ExtendedCheckoutStatus[] $includeExtendedCheckoutStatus Filter your results by extended Checkout status so that only Commerce Cases with Checkouts with the specified statuses are returned. (optional)
     * @param  \PayoneCommercePlatform\Sdk\Domain\PaymentChannel[] $includePaymentChannel Filter your results by payment channel so that only Checkouts which reference transactions on the given channels are returned. (optional)
     * @param  string $paymentReference Filter your results by the merchantReference of the paymentExecution or paymentInformation. (optional)
     * @param  string $paymentId Filter your results by the paymentExecutionId, paymentInformationId or the id of the payment. (optional)
     * @param  string $firstName Filter your results by the customer first name. It is also possible to filter by the first name from the shipping address. (optional)
     * @param  string $surname Filter your results by the customer surname. It is also possible to filter by the surname from the shipping address. (optional)
     * @param  string $email Filter your results by the customer email address. (optional)
     * @param  string $phoneNumber Filter your results by the customer phone number. (optional)
     * @param  string $dateOfBirth Filter your results by the date of birth. Format YYYYMMDD (optional)
     * @param  string $companyInformation Filter your results by the name of the company. (optional)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getCheckoutsRequest(
        string $merchantId,
        int $offset = 0,
        int $size = 25,
        \DateTime $fromDate = null,
        \DateTime $toDate = null,
        ?int $fromCheckoutAmount = null,
        ?int $toCheckoutAmount = null,
        ?int $fromOpenAmount = null,
        ?int $toOpenAmount = null,
        ?int $fromCollectedAmount = null,
        ?int $toCollectedAmount = null,
        ?int $fromCancelledAmount = null,
        ?int $toCancelledAmount = null,
        ?int $fromRefundAmount = null,
        ?int $toRefundAmount = null,
        ?int $fromChargebackAmount = null,
        ?int $toChargebackAmount = null,
        ?string $checkoutId = null,
        ?string $merchantReference = null,
        ?string $merchantCustomerId = null,
        ?array $includePaymentProductId = null,
        ?array $includeCheckoutStatus = null,
        ?array $includeExtendedCheckoutStatus = null,
        ?array $includePaymentChannel = null,
        ?string $paymentReference = null,
        ?string $paymentId = null,
        ?string $firstName = null,
        ?string $surname = null,
        ?string $email = null,
        ?string $phoneNumber = null,
        ?string $dateOfBirth = null,
        ?string $companyInformation = null,
    ): Request {
        if ($dateOfBirth !== null && !preg_match("/^((19|20|21)\\d{6})?$/", $dateOfBirth)) {
            throw new \InvalidArgumentException("invalid value for \"dateOfBirth\" when calling CheckoutApi.getCheckouts, must conform to the pattern /^((19|20|21)\\d{6})?$/.");
        }

        $resourcePath = '/v1/{merchantId}/checkouts';
        $contentType = 'application/json';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $offset,
            'offset', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $size,
            'size', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fromDate,
            'fromDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $toDate,
            'toDate', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fromCheckoutAmount,
            'fromCheckoutAmount', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $toCheckoutAmount,
            'toCheckoutAmount', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fromOpenAmount,
            'fromOpenAmount', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $toOpenAmount,
            'toOpenAmount', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fromCollectedAmount,
            'fromCollectedAmount', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $toCollectedAmount,
            'toCollectedAmount', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fromCancelledAmount,
            'fromCancelledAmount', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $toCancelledAmount,
            'toCancelledAmount', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fromRefundAmount,
            'fromRefundAmount', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $toRefundAmount,
            'toRefundAmount', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fromChargebackAmount,
            'fromChargebackAmount', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $toChargebackAmount,
            'toChargebackAmount', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $checkoutId,
            'checkoutId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $merchantReference,
            'merchantReference', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $merchantCustomerId,
            'merchantCustomerId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $includePaymentProductId,
            'includePaymentProductId', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $includeCheckoutStatus,
            'includeCheckoutStatus', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $includeExtendedCheckoutStatus,
            'includeExtendedCheckoutStatus', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $includePaymentChannel,
            'includePaymentChannel', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $paymentReference,
            'paymentReference', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $paymentId,
            'paymentId', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $firstName,
            'firstName', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $surname,
            'surname', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $email,
            'email', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $phoneNumber,
            'phoneNumber', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $dateOfBirth,
            'dateOfBirth', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $companyInformation,
            'companyInformation', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateCheckout
     *
     * Modify a Checkout
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\PatchCheckoutRequest $patchCheckoutRequest patchCheckoutRequest (required)
     *
     * @throws \payonecommerceplatform\sdk\apierrorresponseexception
     * @throws \payonecommerceplatform\sdk\apiresponseretrievalexception
     * @return void
     */
    public function updateCheckout(string $merchantId, string $commerceCaseId, string $checkoutId, PatchCheckoutRequest $patchCheckoutRequest): void
    {
        $request = $this->updateCheckoutRequest($merchantId, $commerceCaseId, $checkoutId, $patchCheckoutRequest);

        $this->makeApiCall($request, null);
    }

    /**
     * Operation updateCheckoutAsync
     *
     * Modify a Checkout
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\PatchCheckoutRequest $patchCheckoutRequest (required)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateCheckoutAsync($merchantId, $commerceCaseId, $checkoutId, $patchCheckoutRequest): PromiseInterface
    {
        $request = $this->updateCheckoutRequest($merchantId, $commerceCaseId, $checkoutId, $patchCheckoutRequest);

        return $this->makeAsyncApiCall($request, null)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'updateCheckout'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
     * @param  string $commerceCaseId Unique identifier of a Commerce Case. (required)
     * @param  string $checkoutId Unique identifier of a Checkout (required)
     * @param  \PayoneCommercePlatform\Sdk\Domain\PatchCheckoutRequest $patchCheckoutRequest (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updateCheckoutRequest(string $merchantId, string $commerceCaseId, string $checkoutId, PatchCheckoutRequest $patchCheckoutRequest): Request
    {
        $resourcePath = '/v1/{merchantId}/commerce-cases/{commerceCaseId}/checkouts/{checkoutId}';
        $contentType = 'application/json';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        $resourcePath = str_replace(
            '{' . 'merchantId' . '}',
            ObjectSerializer::toPathValue($merchantId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'commerceCaseId' . '}',
            ObjectSerializer::toPathValue($commerceCaseId),
            $resourcePath
        );
        $resourcePath = str_replace(
            '{' . 'checkoutId' . '}',
            ObjectSerializer::toPathValue($checkoutId),
            $resourcePath
        );


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // json_encode the body
        $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($patchCheckoutRequest));

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
}

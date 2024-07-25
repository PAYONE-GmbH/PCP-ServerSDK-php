<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Psr7\Request;
use PayoneCommercePlatform\Sdk\ObjectSerializer;

/**
 * ReportingApi Class Doc Comment
 *
 * @category Class
 * @package  PayoneCommercePlatform\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ReportingApiClient extends BaseApiClient
{
    /**
     * Operation getCheckoutSummaryReports
     *
     * Get a summarized list of Checkouts in csv format based on provided search criteria
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
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
     * @param  string $reportingToken Filter your results by the reporting token. (optional)
     *
     * @throws \PayoneCommercePlatform\Sdk\ApiErrorResponseException
     * @throws \PayoneCommercePlatform\Sdk\ApiResponseRetrievalException
     * @return string
     */
    public function getCheckoutSummaryReports(
        string $merchantId,
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
        ?string $reportingToken = null,
    ): string {
        $request = $this->getCheckoutSummaryReportsRequest($merchantId, $fromDate, $toDate, $fromCheckoutAmount, $toCheckoutAmount, $fromOpenAmount, $toOpenAmount, $fromCollectedAmount, $toCollectedAmount, $fromCancelledAmount, $toCancelledAmount, $fromRefundAmount, $toRefundAmount, $fromChargebackAmount, $toChargebackAmount, $checkoutId, $merchantReference, $merchantCustomerId, $includePaymentProductId, $includeCheckoutStatus, $includeExtendedCheckoutStatus, $includePaymentChannel, $paymentReference, $paymentId, $firstName, $surname, $email, $phoneNumber, $dateOfBirth, $companyInformation, $reportingToken);
        list($response) = $this->makeApiCall($request, 'string');
        return $response;
    }

    /**
     * Operation getCheckoutSummaryReportsAsync
     *
     * Get a summarized list of Checkouts in csv format based on provided search criteria
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
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
     * @param  string $reportingToken Filter your results by the reporting token. (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCheckoutSummaryReportsAsync(
        string $merchantId,
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
        ?string $reportingToken = null,
    ) {
        $request = $this->getCheckoutSummaryReportsRequest($merchantId, $fromDate, $toDate, $fromCheckoutAmount, $toCheckoutAmount, $fromOpenAmount, $toOpenAmount, $fromCollectedAmount, $toCollectedAmount, $fromCancelledAmount, $toCancelledAmount, $fromRefundAmount, $toRefundAmount, $fromChargebackAmount, $toChargebackAmount, $checkoutId, $merchantReference, $merchantCustomerId, $includePaymentProductId, $includeCheckoutStatus, $includeExtendedCheckoutStatus, $includePaymentChannel, $paymentReference, $paymentId, $firstName, $surname, $email, $phoneNumber, $dateOfBirth, $companyInformation, $reportingToken);
        return $this->makeAsyncApiCall($request, 'string')
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Create request for operation 'getCheckoutSummaryReports'
     *
     * @param  string $merchantId The merchantId identifies uniquely the merchant. A Checkout has exactly one merchant. (required)
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
     * @param  string $reportingToken Filter your results by the reporting token. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getCheckoutSummaryReportsRequest(
        string $merchantId,
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
        ?string $reportingToken = null,
    ): Request {
        $resourcePath = '/v1/{merchantId}/reports/checkout-summary';
        $contentType = $this::MEDIA_TYPE_JSON;
        $queryParams = [];
        $headerParams = [];
        $multipart = false;

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
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $reportingToken,
            'reportingToken', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($merchantId !== null) {
            $resourcePath = str_replace(
                '{' . 'merchantId' . '}',
                ObjectSerializer::toPathValue($merchantId),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['text/csv', $this::MEDIA_TYPE_JSON, ],
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
}

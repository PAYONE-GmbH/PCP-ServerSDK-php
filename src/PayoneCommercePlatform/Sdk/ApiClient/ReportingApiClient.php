<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use PayoneCommercePlatform\Sdk\Api\ReportingApi;

class ReportingApiClient extends ReportingApi
{
    use ClientTrait;

    /**
     * @inheritDoc
     */
    public function getCheckoutSummaryReportsRequest($merchantId, $fromDate = null, $toDate = null, $fromCheckoutAmount = null, $toCheckoutAmount = null, $fromOpenAmount = null, $toOpenAmount = null, $fromCollectedAmount = null, $toCollectedAmount = null, $fromCancelledAmount = null, $toCancelledAmount = null, $fromRefundAmount = null, $toRefundAmount = null, $fromChargebackAmount = null, $toChargebackAmount = null, $checkoutId = null, $merchantReference = null, $merchantCustomerId = null, $includePaymentProductId = null, $includeCheckoutStatus = null, $includeExtendedCheckoutStatus = null, $includePaymentChannel = null, $paymentReference = null, $paymentId = null, $firstName = null, $surname = null, $email = null, $phoneNumber = null, $dateOfBirth = null, $companyInformation = null, $reportingToken = null, string $contentType = self::contentTypes['getCheckoutSummaryReports'][0])
    {
        $request = parent::getCheckoutSummaryReportsRequest($merchantId, $fromDate, $toDate, $fromCheckoutAmount, $toCheckoutAmount, $fromOpenAmount, $toOpenAmount, $fromCollectedAmount, $toCollectedAmount, $fromCancelledAmount, $toCancelledAmount, $fromRefundAmount, $toRefundAmount, $fromChargebackAmount, $toChargebackAmount, $checkoutId, $merchantReference, $merchantCustomerId, $includePaymentProductId, $includeCheckoutStatus, $includeExtendedCheckoutStatus, $includePaymentChannel, $paymentReference, $paymentId, $firstName, $surname, $email, $phoneNumber, $dateOfBirth, $companyInformation, $reportingToken, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }
}
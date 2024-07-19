<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use PayoneCommercePlatform\Sdk\Api\CheckoutApi;
use GuzzleHttp\Psr7\Request;

class CheckoutApiClient extends CheckoutApi
{
    use ClientTrait;

    /**
     * @inheritDoc
     */
    public function createCheckoutRequest($merchantId, $commerceCaseId, $createCheckoutRequest, string $contentType = self::contentTypes['createCheckout'][0]): Request
    {
        $request = parent::createCheckoutRequest($merchantId, $commerceCaseId, $createCheckoutRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function deleteCheckoutRequest($merchantId, $commerceCaseId, $checkoutId, string $contentType = self::contentTypes['deleteCheckout'][0]): Request
    {
        $request = parent::deleteCheckoutRequest($merchantId, $commerceCaseId, $checkoutId, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function getCheckoutRequest($merchantId, $commerceCaseId, $checkoutId, string $contentType = self::contentTypes['getCheckout'][0]): Request
    {
        $request = parent::getCheckoutRequest($merchantId, $commerceCaseId, $checkoutId, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function getCheckoutsRequest($merchantId, $offset = 0, $size = 25, $fromDate = null, $toDate = null, $fromCheckoutAmount = null, $toCheckoutAmount = null, $fromOpenAmount = null, $toOpenAmount = null, $fromCollectedAmount = null, $toCollectedAmount = null, $fromCancelledAmount = null, $toCancelledAmount = null, $fromRefundAmount = null, $toRefundAmount = null, $fromChargebackAmount = null, $toChargebackAmount = null, $checkoutId = null, $merchantReference = null, $merchantCustomerId = null, $includePaymentProductId = null, $includeCheckoutStatus = null, $includeExtendedCheckoutStatus = null, $includePaymentChannel = null, $paymentReference = null, $paymentId = null, $firstName = null, $surname = null, $email = null, $phoneNumber = null, $dateOfBirth = null, $companyInformation = null, string $contentType = self::contentTypes['getCheckouts'][0]): Request
    {
        $request = parent::getCheckoutsRequest($merchantId, $offset, $size, $fromDate, $toDate, $fromCheckoutAmount, $toCheckoutAmount, $fromOpenAmount, $toOpenAmount, $fromCollectedAmount, $toCollectedAmount, $fromCancelledAmount, $toCancelledAmount, $fromRefundAmount, $toRefundAmount, $fromChargebackAmount, $toChargebackAmount, $checkoutId, $merchantReference, $merchantCustomerId, $includePaymentProductId, $includeCheckoutStatus, $includeExtendedCheckoutStatus, $includePaymentChannel, $paymentReference, $paymentId, $firstName, $surname, $email, $phoneNumber, $dateOfBirth, $companyInformation, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function updateCheckoutRequest($merchantId, $commerceCaseId, $checkoutId, $patchCheckoutRequest, string $contentType = self::contentTypes['updateCheckout'][0]): Request
    {
        $request = parent::updateCheckoutRequest($merchantId, $commerceCaseId, $checkoutId, $patchCheckoutRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }
}


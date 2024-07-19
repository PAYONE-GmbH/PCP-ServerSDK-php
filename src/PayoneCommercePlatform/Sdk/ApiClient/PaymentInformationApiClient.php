<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use PayoneCommercePlatform\Sdk\Api\PaymentInformationApi;
use GuzzleHttp\Psr7\Request;

class PaymentInformationApiClient extends PaymentInformationApi
{
    use ClientTrait;

    /**
     * @inheritDoc
     */
    public function createPaymentInformationRequest($merchantId, $commerceCaseId, $checkoutId, $paymentInformationRequest, string $contentType = self::contentTypes['createPaymentInformation'][0]): Request
    {
        $request = parent::createPaymentInformationRequest($merchantId, $commerceCaseId, $checkoutId, $paymentInformationRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function getPaymentInformationRequest($merchantId, $commerceCaseId, $checkoutId, $paymentInformationId, string $contentType = self::contentTypes['getPaymentInformation'][0]): Request
    {
        $request = parent::getPaymentInformationRequest($merchantId, $commerceCaseId, $checkoutId, $paymentInformationId, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }
}


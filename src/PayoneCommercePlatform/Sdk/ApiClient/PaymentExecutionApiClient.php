<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use PayoneCommercePlatform\Sdk\Api\PaymentExecutionApi;

class PaymentExecutionApiClient extends PaymentExecutionApi
{
    use ClientTrait;

    /**
     * @inheritDoc
     */
    public function cancelPaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $cancelPaymentRequest, string $contentType = self::contentTypes['cancelPaymentExecution'][0])
    {
        $request = parent::cancelPaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $cancelPaymentRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function capturePaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $capturePaymentRequest, string $contentType = self::contentTypes['capturePaymentExecution'][0])
    {
        $request = parent::capturePaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $capturePaymentRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function completePaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $completePaymentRequest, string $contentType = self::contentTypes['completePayment'][0])
    {
        $request = parent::completePaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $completePaymentRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function createPaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionRequest, string $contentType = self::contentTypes['createPayment'][0])
    {
        $request = parent::createPaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function pausePaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, string $contentType = self::contentTypes['pausePayment'][0])
    {
        $request = parent::pausePaymentRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function refundPaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $refundRequest, string $contentType = self::contentTypes['refundPaymentExecution'][0])
    {
        $request = parent::refundPaymentExecutionRequest($merchantId, $commerceCaseId, $checkoutId, $paymentExecutionId, $refundRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }
}
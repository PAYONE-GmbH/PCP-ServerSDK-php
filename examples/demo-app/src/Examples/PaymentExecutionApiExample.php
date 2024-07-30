<?php

namespace DemoApp\Examples;

use PayoneCommercePlatform\Sdk\ApiClient\PaymentExecutionApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;

class PaymentExecutionApiExample
{
    protected string $merchantId = '';
    protected string $commerceCaseId = '';
    protected string $checkoutId = '';
    protected PaymentExecutionApiClient $client;

    public function __construct(CommunicatorConfiguration $config)
    {
        $this->merchantId = getenv('MERCHANT_ID');
        $this->commerceCaseId = getenv('COMMERCE_CASE_ID');
        $this->checkoutId = getenv('CHECKOUT_ID');

        if (empty($this->merchantId)) {
            throw new \RuntimeException('required environment variable MERCHANT_ID is not set');
        }

        $this->client = new PaymentExecutionApiClient($config);
    }
    
    protected function getCommerceCaseId(): string
    {
        if (empty($this->commerceCaseId)) {
            throw new \RuntimeException('required environment variable COMMERCE_CASE_ID is not set');
        }
        return $this->commerceCaseId;
    }

    protected function getCheckoutId(): string
    {
        if (empty($this->checkoutId)) {
            throw new \RuntimeException('required environment variable CHECKOUT_ID is not set');
        }
        return $this->checkoutId;
    }

    protected function getPaymentId(): string
    {
        if (empty($this->paymentId)) {
            throw new \RuntimeException('required environment variable PAYMENT_ID is not set');
        }
        return $this->paymentId;
    }

}

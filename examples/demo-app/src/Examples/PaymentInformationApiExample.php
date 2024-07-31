<?php

namespace DemoApp\Examples;

use PayoneCommercePlatform\Sdk\ApiClient\PaymentInformationApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\PaymentChannel;
use PayoneCommercePlatform\Sdk\Models\PaymentInformationRequest;
use PayoneCommercePlatform\Sdk\Models\PaymentType;

class PaymentInformationApiExample
{
    protected string $merchantId = '';
    protected string $commerceCaseId = '';
    protected string $checkoutId = '';
    protected ?string $createdPaymentId = null;

    protected PaymentInformationApiClient $client;

    public function __construct(CommunicatorConfiguration $config)
    {
        $this->merchantId = getenv('MERCHANT_ID');
        $this->commerceCaseId = getenv('COMMERCE_CASE_ID');
        $this->checkoutId = getenv('CHECKOUT_ID');

        if (empty($this->merchantId)) {
            throw new \RuntimeException('required environment variable MERCHANT_ID is not set');
        }

        $this->client = new PaymentInformationApiClient($config);
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

    public function postOne(): void
    {
        $request = new PaymentInformationRequest(
            amountOfMoney: new AmountOfMoney(36000, 'USD'),
            type: PaymentType::SALE,
            paymentChannel: PaymentChannel::ECOMMERCE,
            paymentProductId: 1,
        );
        $response = $this->client->createPaymentInformation($this->merchantId, $this->getCommerceCaseId(), $this->getCheckoutId(), $request);
        var_dump($response);
    }

    public function getOne(): void
    {
        if ($this->createdPaymentId === null) {
            throw new \RuntimeException("No payment id available. Please run postOne() first.");
        }
        $response = $this->client-> getPaymentInformation($this->merchantId, $this->getCommerceCaseId(), $this->getCheckoutId(), $this->createdPaymentId);
        var_dump($response);
    }
}

<?php

namespace DemoApp\Examples;

use PayoneCommercePlatform\Sdk\ApiClient\PaymentExecutionApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\BankAccountInformation;
use PayoneCommercePlatform\Sdk\Models\FinancingPaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentChannel;
use PayoneCommercePlatform\Sdk\Models\PaymentExecutionRequest;
use PayoneCommercePlatform\Sdk\Models\PaymentExecutionSpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentProduct3392SpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentType;
use PayoneCommercePlatform\Sdk\Models\References;

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

    public function createOne(): void
    {
        $request = new PaymentExecutionRequest(
            paymentMethodSpecificInput: new PaymentMethodSpecificInput(
                financingPaymentMethodSpecificInput: new FinancingPaymentMethodSpecificInput(
                    paymentProductId: 3392,
                    requiresApproval: false,
                    paymentProduct3392SpecificInput: new PaymentProduct3392SpecificInput(
                        new BankAccountInformation(
                            iban: 'DE05500105178431848295',
                            accountHolder: 'Robert Jordan',
                        ),
                    ),
                )
            ),
            paymentExecutionSpecificInput: new PaymentExecutionSpecificInput(
                paymentReferences: new References('order-1234'),
                amountOfMoney: new AmountOfMoney(36000, 'USD')
            ),
        );
        $this->client->createPayment($this->merchantId, $this->getCommerceCaseId(), $this->getCheckoutId(), $request);
    }
}

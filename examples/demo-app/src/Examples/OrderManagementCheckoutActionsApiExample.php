<?php

namespace DemoApp\Examples;

use PayoneCommercePlatform\Sdk\ApiClient\OrderManagementCheckoutActionsApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\Models\BankAccountInformation;
use PayoneCommercePlatform\Sdk\Models\FinancingPaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\OrderRequest;
use PayoneCommercePlatform\Sdk\Models\PaymentMethodSpecificInput;
use PayoneCommercePlatform\Sdk\Models\PaymentProduct3392SpecificInput;
use PayoneCommercePlatform\Sdk\Models\References;

class OrderManagementCheckoutActionsApiExample
{
    protected string $merchantId = '';
    protected string $commerceCaseId = '';
    protected string $checkoutId = '';
    protected ?string $createOrderId = null;
    protected OrderManagementCheckoutActionsApiClient $client;

    public function __construct(CommunicatorConfiguration $config)
    {
        $this->merchantId = getenv('MERCHANT_ID');
        $this->commerceCaseId = getenv('COMMERCE_CASE_ID');
        $this->checkoutId = getenv('CHECKOUT_ID');

        if (empty($this->merchantId)) {
            throw new \RuntimeException('required environment variable MERCHANT_ID is not set');
        }

        $this->client = new OrderManagementCheckoutActionsApiClient($config);
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

    public function createOne(): string
    {
        $request = new OrderRequest(
            orderReferences: new References(
                merchantReference: 'merchantReference',
                descriptor: 'Hi, there',
            ),
            /* items:  [new OrderItem(id: 'ID12345', quantity: 10)], */
            /* orderType: OrderType::PARTIAL, */
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
                ),
            ),
        );
        $response = $this->client->createOrder($this->merchantId, $this->getCommerceCaseId(), $this->getCheckoutId(), $request);
        var_dump($response);
    }
}

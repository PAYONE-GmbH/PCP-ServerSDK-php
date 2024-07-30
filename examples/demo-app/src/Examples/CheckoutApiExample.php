<?php

namespace DemoApp\Examples;

use PayoneCommercePlatform\Sdk\ApiClient\CheckoutApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\Models\AmountOfMoney;
use PayoneCommercePlatform\Sdk\Models\CheckoutResponse;
use PayoneCommercePlatform\Sdk\Models\CreateCheckoutRequest;
use PayoneCommercePlatform\Sdk\Models\PatchCheckoutRequest;
use PayoneCommercePlatform\Sdk\Models\StatusCheckout;
use PayoneCommercePlatform\Sdk\Queries\GetCheckoutsQuery;

class CheckoutApiExample
{
    protected string $merchantId = '';
    protected string $commerceCaseId = '';
    protected string $checkoutId = '';
    protected CheckoutApiClient $client;

    protected ?string $createdCheckoutId = null;

    public function __construct(CommunicatorConfiguration $config)
    {
        $this->merchantId = getenv('MERCHANT_ID');
        $this->commerceCaseId = getenv('COMMERCE_CASE_ID');
        $this->checkoutId = getenv('CHECKOUT_ID');

        if (empty($this->merchantId)) {
            throw new \RuntimeException('required environment variable MERCHANT_ID is not set');
        }

        $this->client = new CheckoutApiClient($config);
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

    public function runPostOne(): void
    {
        /** @var CreateCheckoutRequest */
        $request = new CreateCheckoutRequest();
        /** @var AmountOfMoney */
        $amount = new AmountOfMoney(36000, 'USD');
        $request->setAmountOfMoney($amount);

        $response = $this->client->createCheckout($this->merchantId, $this->getCommerceCaseId(), $request);
        $this->createdCheckoutId = $response->getCheckoutId();
        var_dump($response);
    }

    public function runFilterAll(): void
    {
        /** @var GetCheckoutsQuery */
        $query = (new GetCheckoutsQuery())
          ->setSize(10)
          ->setIncludeCheckoutStatus([StatusCheckout::OPEN, StatusCheckout::PENDING_COMPLETION]);
        $response = $this->client->getCheckouts($this->merchantId, $query);
        var_dump($response);
    }

    public function runGetOne(): void
    {
        $response = $this->client->getCheckout($this->merchantId, $this->getCommerceCaseId(), $this->getCheckoutId());
        var_dump($response);
    }

    public function runUpdateOne(): void
    {
        /** @var PatchCheckoutRequest */
        $request = new PatchCheckoutRequest();
        /** @var AmountOfMoney */
        $amount = new AmountOfMoney(37000, 'USD');
        $request->setAmountOfMoney($amount);

        $this->client->updateCheckout($this->merchantId, $this->getCommerceCaseId(), $this->getCheckoutId(), $request);
        $response = $this->client->getCheckout($this->merchantId, $this->getCommerceCaseId(), $this->getCheckoutId());
        var_dump($response);
    }

    public function runDeleteOne(): void
    {
        if (empty($this->createdCheckoutId)) {
            throw new \RuntimeException('No checkout created yet, make sure to call runPostOne() first');
        }
        $this->client->deleteCheckout($this->merchantId, $this->getCommerceCaseId(), $this->createdCheckoutId);
    }
}

<?php

namespace DemoApp\Examples;

use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\Models\Address;
use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseRequest;
use PayoneCommercePlatform\Sdk\Models\Customer;

class CommerceCaseApiExample
{
    protected string $merchantId = '';
    protected string $commerceCaseId = '';
    protected CommunicatorConfiguration $config;
    protected CommerceCaseApiClient $client;

    public function __construct(CommunicatorConfiguration $config)
    {
        $this->config = $config;

        $this->merchantId = getenv('MERCHANT_ID');
        $this->commerceCaseId = 'foo'; // getenv('COMMERCE_CASE_ID');

        if (empty($this->merchantId)) {
            throw new \RuntimeException('required environment variable MERCHANT_ID is not set');
        }
        if (empty($this->commerceCaseId)) {
            throw new \RuntimeException('required environment variable COMMERCE_CASE_ID is not set');
        }

        $this->client = new CommerceCaseApiClient($this->config);
    }

    public function runPostOne(): void
    {

        $response = $this->client->createCommerceCase($this->merchantId, new CreateCommerceCaseRequest());
        var_dump($response);
    }

    public function runGetAll(): void
    {
        $response = $this->client->getCommerceCases($this->merchantId);
        var_dump($response);
    }

    public function runGetOne(): void
    {
        $response = $this->client->getCommerceCase($this->merchantId, $this->commerceCaseId);
        var_dump($response);
    }

    public function runUpdateOne(): void
    {
        $commerceCase = $this->client->getCommerceCase($this->merchantId, $this->commerceCaseId);

        $customer = new Customer();
        $address = (new Address())
          ->setCity('Kerken');
        $customer->setBillingAddress($address);

        $this->client->updateCommerceCase($this->merchantId, $this->commerceCaseId, $customer);
        
        $response = $this->client->getCommerceCase($this->merchantId, $this->commerceCaseId);
        var_dump($response);
    }
}

<?php

namespace DemoApp\Examples;

use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\Models\Address;
use PayoneCommercePlatform\Sdk\Models\CompanyInformation;
use PayoneCommercePlatform\Sdk\Models\CreateCommerceCaseRequest;
use PayoneCommercePlatform\Sdk\Models\Customer;
use PayoneCommercePlatform\Sdk\Models\PersonalInformation;
use PayoneCommercePlatform\Sdk\Models\PersonalName;

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
        $this->commerceCaseId = getenv('COMMERCE_CASE_ID');

        if (empty($this->merchantId)) {
            throw new \RuntimeException('required environment variable MERCHANT_ID is not set');
        }

        $this->client = new CommerceCaseApiClient($this->config);
    }

    protected function getCommerceCaseId(): string
    {
        if (empty($this->commerceCaseId)) {
            throw new \RuntimeException('required environment variable COMMERCE_CASE_ID is not set');
        }
        return $this->commerceCaseId;
    }

    public function runPostOne(): void
    {
        /** @var CreateCommerceCaseRequest */
        $request = new CreateCommerceCaseRequest();
        $customer = (new Customer())
            ->setLocale('de')
            ->setBillingAddress(new Address(
                city: 'Kerken',
                countryCode: 'DE',
                street: 'Hochstr.',
                houseNumber: '6',
            ));
        $request->setCustomer($customer);

        $response = $this->client->createCommerceCase($this->merchantId, $request);
        var_dump($response);
    }

    public function runGetAll(): void
    {
        $response = $this->client->getCommerceCases($this->merchantId);
        var_dump($response);
    }

    public function runGetOne(): void
    {
        $response = $this->client->getCommerceCase($this->merchantId, $this->getCommerceCaseId());
        var_dump($response);
    }

    public function runUpdateOne(): void
    {
        $customer = (new Customer());
        $personalInformation = (new PersonalInformation())
          ->setDateOfBirth('1980-12-12')
          ->setName(new PersonalName(firstName: 'Rich', surname: 'Harris'));
        $customer->setPersonalInformation($personalInformation);

        $this->client->updateCommerceCase($this->merchantId, $this->commerceCaseId, new Customer());

        $response = $this->client->getCommerceCase($this->merchantId, $this->getCommerceCaseId());
        var_dump($response);
    }
}

<?php

namespace PayoneCommercePlatform\Sdk;

use Exception;
use GuzzleHttp\Client;
use PayoneCommercePlatform\Sdk\ApiClient\CheckoutApiClient;
use PHPUnit\Framework\TestCase;

/**
 * Class TestCase
 */
abstract class PayoneCommercePlatformTestCase extends TestCase
{
    /**
     * @var string|null
     */
    protected $configFilePath = __DIR__.'/../../config.json';

    /**
     * @var JsonValuesStore|null
     */
    protected $jsonValuesStore = null;

    /**
     * @var CommunicatorConfiguration|null
     */
    protected $communicatorConfiguration = null;

    /**
     * @var CheckoutApiClient|null
     */
    protected $checkoutApiClient = null;

    /**
     * @var Client
     */
    protected $client;

    protected function setUp(): void
    {
        $this->client = $this->getMockBuilder(Client::class)->getMock();

        $this->communicatorConfiguration = new CommunicatorConfiguration(
            $this->getApiKey(),
            $this->getApiSecret(),
            $this->getHost(),
            'PAYONE GmbH',
            [
                'shopModule' => 'shopware6'
            ]
        );

        $this->checkoutApiClient = new CheckoutApiClient(
            new RequestHeaderGenerator($this->communicatorConfiguration),
            new Client(['verify' => false]),
            $this->communicatorConfiguration
        );
    }

    /**
     * @return string
     * @throws Exception
     */
    protected function getMerchantId()
    {
        return $this->getJsonValuesStore()->getValue('merchant_id');
    }

    /**
     * @return string
     * @throws Exception
     */
    protected function getApiKey()
    {
        return $this->getJsonValuesStore()->getValue('api_key');
    }

    /**
     * @return string
     * @throws Exception
     */
    protected function getApiSecret()
    {
        return $this->getJsonValuesStore()->getValue('api_secret');
    }

    /**
     * @return string
     * @throws Exception
     */
    protected function getHost()
    {
        return $this->getJsonValuesStore()->getValue('host');
    }


    /**
     * @return JsonValuesStore
     */
    protected function getJsonValuesStore()
    {
        if (is_null($this->jsonValuesStore)) {
            $this->jsonValuesStore = new JsonValuesStore($this->configFilePath);
        }
        return $this->jsonValuesStore;
    }

    protected function getFixture(string $filename): string
    {
        return file_get_contents(__DIR__.'/Fixtures/'.$filename);
    }
}

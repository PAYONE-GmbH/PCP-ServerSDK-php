<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\ClientInterface;
use PayoneCommercePlatform\Sdk\Configuration;
use PayoneCommercePlatform\Sdk\HeaderSelector;
use PayoneCommercePlatform\Sdk\RequestHeaderGenerator;

trait ClientTrait
{
    /**
     * @param RequestHeaderGenerator $requestHeaderGenerator
     * @param ClientInterface|null   $client
     * @param Configuration|null     $config
     * @param HeaderSelector|null    $selector
     */
    public function __construct(
        protected RequestHeaderGenerator $requestHeaderGenerator,
        ClientInterface                  $client = null,
        Configuration                    $config = null,
        HeaderSelector                   $selector = null,
    ) {
        parent::__construct($client, $config, $selector);
    }
}

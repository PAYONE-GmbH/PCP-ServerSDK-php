<?php

namespace PayoneCommercePlatform\Sdk;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;

class CommunicatorConfigurationTest extends TestCase
{
    public function testGetters(): void
    {
        $config = new CommunicatorConfiguration(apiKey: 'forget', apiSecret: 'this');
        $config = $config->setApiKey('lock');
        $config = $config->setApiSecret('sshhhh');
        $config = $config->setIntegrator('Elephant');
        $config = $config->setHost('https://api.example.com');
        $config = $config->setServerMetaInfo(['hi' => 'there']);
        $config = $config->addServerMetaInfo('meta', 'meta');
        $config = $config->setClientMetaInfo(['dog' => 'woof']);
        $config = $config->addClientMetaInfo('dog', 'bark');

        $this->assertEquals('lock', $config->getApiKey());
        $this->assertEquals('sshhhh', $config->getApiSecret());
        $this->assertEquals('Elephant', $config->getIntegrator());
        $this->assertEquals('https://api.example.com', $config->getHost());
        $this->assertEquals(['hi' => 'there', 'meta' => 'meta'], $config->getServerMetaInfo());
        $this->assertEquals(['dog' => 'bark'], $config->getClientMetaInfo());
    }

    public function testHttpClientConfiguration(): void
    {
        // Test default HTTP client (should be null)
        $config = new CommunicatorConfiguration(apiKey: 'test', apiSecret: 'secret');
        $this->assertNull($config->getHttpClient());

        // Test setting HTTP client via constructor
        $customClient = new Client(['timeout' => 30]);
        $configWithClient = new CommunicatorConfiguration(
            apiKey: 'test',
            apiSecret: 'secret',
            httpClient: $customClient
        );
        $this->assertSame($customClient, $configWithClient->getHttpClient());

        // Test setting HTTP client via setter
        $anotherClient = new Client(['timeout' => 60]);
        $config->setHttpClient($anotherClient);
        $this->assertSame($anotherClient, $config->getHttpClient());

        // Test setting null HTTP client
        $config->setHttpClient(null);
        $this->assertNull($config->getHttpClient());
    }

    public function testOnRequestBodyDefaultsToNull(): void
    {
        $config = new CommunicatorConfiguration(apiKey: 'test', apiSecret: 'secret');

        $this->assertNull($config->getOnRequestBody());
    }

    public function testOnResponseBodyDefaultsToNull(): void
    {
        $config = new CommunicatorConfiguration(apiKey: 'test', apiSecret: 'secret');

        $this->assertNull($config->getOnResponseBody());
    }

    public function testOnRequestBodyCanBeSetViaConstructor(): void
    {
        $cb = static function (string $body): void {};
        $config = new CommunicatorConfiguration(apiKey: 'test', apiSecret: 'secret', onRequestBody: $cb);

        $this->assertSame($cb, $config->getOnRequestBody());
    }

    public function testOnResponseBodyCanBeSetViaConstructor(): void
    {
        $cb = static function (string $body): void {};
        $config = new CommunicatorConfiguration(apiKey: 'test', apiSecret: 'secret', onResponseBody: $cb);

        $this->assertSame($cb, $config->getOnResponseBody());
    }

    public function testOnRequestBodyCanBeSetViaSetter(): void
    {
        $config = new CommunicatorConfiguration(apiKey: 'test', apiSecret: 'secret');
        $cb = static function (string $body): void {};

        $config->setOnRequestBody($cb);

        $this->assertSame($cb, $config->getOnRequestBody());
    }

    public function testOnResponseBodyCanBeSetViaSetter(): void
    {
        $config = new CommunicatorConfiguration(apiKey: 'test', apiSecret: 'secret');
        $cb = static function (string $body): void {};

        $config->setOnResponseBody($cb);

        $this->assertSame($cb, $config->getOnResponseBody());
    }

    public function testCallbacksCanBeCleared(): void
    {
        $cb = static function (string $body): void {};
        $config = new CommunicatorConfiguration(
            apiKey: 'test',
            apiSecret: 'secret',
            onRequestBody: $cb,
            onResponseBody: $cb,
        );

        $config->setOnRequestBody(null);
        $config->setOnResponseBody(null);

        $this->assertNull($config->getOnRequestBody());
        $this->assertNull($config->getOnResponseBody());
    }
}

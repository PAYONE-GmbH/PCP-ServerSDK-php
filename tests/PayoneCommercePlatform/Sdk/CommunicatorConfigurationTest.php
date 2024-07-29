<?php

namespace PayoneCommercePlatform\Sdk;

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
}

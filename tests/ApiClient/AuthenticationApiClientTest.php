<?php

use PayoneCommercePlatform\Sdk\ApiClient\AuthenticationApiClient;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\Models\AuthenticationToken;
use PHPUnit\Framework\TestCase;

class AuthenticationApiClientTest extends TestCase
{
    private $client;

    protected function setUp(): void
    {
        $config = new CommunicatorConfiguration(
            apiKey: getenv('API_KEY'),
            integrator: 'PHP SDK Test',
        );
        $config->setApiSecret(getenv('API_SECRET'));
        $this->client = new AuthenticationApiClient($config);
    }

    public function testGetAuthenticationTokensReturnsToken(): void
    {
        $merchantId = getenv('MERCHANT_ID');
        if (!$merchantId) {
            $this->markTestSkipped('MERCHANT_ID not set in environment');
        }
        $token = $this->client->getAuthenticationTokens($merchantId);
        $this->assertInstanceOf(AuthenticationToken::class, $token);
        $this->assertNotEmpty($token->getToken());
        $this->assertNotEmpty($token->getId());
        $this->assertNotEmpty($token->getCreationDate());
        $this->assertNotEmpty($token->getExpirationDate());
    }
}

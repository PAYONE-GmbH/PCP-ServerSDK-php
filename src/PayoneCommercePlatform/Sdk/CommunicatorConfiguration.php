<?php

namespace PayoneCommercePlatform\Sdk;

class CommunicatorConfiguration extends Configuration
{
    /**
     * @param string      $apiKeyId
     * @param string      $apiSecret
     * @param string|null $host
     * @param string|null $integrator
     * @param array       $clientMetaInfo
     */
    public function __construct(
        protected string  $apiKeyId,
        protected string  $apiSecret,
        ?string           $host = null,
        protected ?string $integrator = null,
        protected array   $clientMetaInfo = []
    )
    {
        // by default use default host from codegen
        if ($host) {
            $this->host = $host;
        }
    }

    public function getApiKeyId(): string
    {
        return $this->apiKeyId;
    }

    public function setApiKeyId(string $apiKeyId): void
    {
        $this->apiKeyId = $apiKeyId;
    }

    public function getApiSecret(): string
    {
        return $this->apiSecret;
    }

    public function setApiSecret(string $apiSecret): void
    {
        $this->apiSecret = $apiSecret;
    }

    public function getIntegrator(): ?string
    {
        return $this->integrator;
    }

    public function setIntegrator(?string $integrator): void
    {
        $this->integrator = $integrator;
    }

    public function getClientMetaInfo(): array
    {
        return $this->clientMetaInfo;
    }

    public function setClientMetaInfo(array $clientMetaInfo): void
    {
        $this->clientMetaInfo = $clientMetaInfo;
    }

    public function addClientMetaInfo(string $key, string $value): void
    {
        $this->clientMetaInfo[$key] = $value;
    }
}
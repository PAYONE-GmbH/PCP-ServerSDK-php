<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing information about the device of the end customer.
 */
class CustomerDevice
{
    /**
     * @var string|null The IP address of the customer client from the HTTP Headers.
     */
    #[SerializedName('ipAddress')]
    protected ?string $ipAddress;

    /**
     * @var string|null Tokenized representation of the end customer's device. For example used for PAYONE Buy Now, Pay Later (BNPL).
     */
    #[SerializedName('deviceToken')]
    protected ?string $deviceToken;

    public function __construct(
        ?string $ipAddress = null,
        ?string $deviceToken = null
    ) {
        $this->ipAddress = $ipAddress;
        $this->deviceToken = $deviceToken;
    }

    // Getters and Setters
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function getDeviceToken(): ?string
    {
        return $this->deviceToken;
    }

    public function setDeviceToken(?string $deviceToken): self
    {
        $this->deviceToken = $deviceToken;
        return $this;
    }
}

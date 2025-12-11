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

    /**
     * @var string|null The accept-header of the customer client from the HTTP Headers.
     */
    #[SerializedName('acceptHeader')]
    protected ?string $acceptHeader;

    /**
     * @var string|null User-Agent of the client device/browser from the HTTP Headers.
     */
    #[SerializedName('userAgent')]
    protected ?string $userAgent;

    public function __construct(
        ?string $ipAddress = null,
        ?string $deviceToken = null,
        ?string $acceptHeader = null,
        ?string $userAgent = null
    ) {
        $this->ipAddress = $ipAddress;
        $this->deviceToken = $deviceToken;
        $this->acceptHeader = $acceptHeader;
        $this->userAgent = $userAgent;
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

    public function getAcceptHeader(): ?string
    {
        return $this->acceptHeader;
    }

    public function setAcceptHeader(?string $acceptHeader): self
    {
        $this->acceptHeader = $acceptHeader;
        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    public function setUserAgent(?string $userAgent): self
    {
        $this->userAgent = $userAgent;
        return $this;
    }
}

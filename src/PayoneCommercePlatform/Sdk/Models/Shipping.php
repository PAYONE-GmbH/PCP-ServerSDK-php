<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * @description Object containing information regarding shipping / delivery
 */
class Shipping
{
    /**
     * @var AddressPersonal|null Shipping address details.
     */
    #[SerializedName('address')]
    protected ?AddressPersonal $address;

    public function __construct(
        ?AddressPersonal $address = null,
    ) {
        $this->address = $address;
    }

    // Getters and Setters
    public function getAddress(): ?AddressPersonal
    {
        return $this->address;
    }

    public function setAddress(?AddressPersonal $address): self
    {
        $this->address = $address;
        return $this;
    }
}

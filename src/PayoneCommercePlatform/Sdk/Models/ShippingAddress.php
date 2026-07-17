<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ShippingAddress extends AddressPersonal
{
    #[SerializedName('companyName')]
    protected ?string $companyName;

    public function __construct(?string $additionalInfo = null, ?string $city = null, ?string $countryCode = null, ?string $houseNumber = null, ?string $state = null, ?string $street = null, ?string $zip = null, ?PersonalName $name = null, ?string $companyName = null)
    {
        parent::__construct($additionalInfo, $city, $countryCode, $houseNumber, $state, $street, $zip, $name);
        $this->companyName = $companyName;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }
    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }
}

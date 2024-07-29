<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\PersonalName;

class AddressPersonal
{
    /**
     * @var string|null Second line of street or additional address information such as apartments and suits
     */
    #[SerializedName('additionalInfo')]
    protected ?string $additionalInfo;

    /**
     * @var string|null City
     */
    #[SerializedName('city')]
    protected ?string $city;

    /**
     * @var string|null ISO 3166-1 alpha-2 country code
     */
    #[SerializedName('countryCode')]
    protected ?string $countryCode;

    /**
     * @var string|null House number
     */
    #[SerializedName('houseNumber')]
    protected ?string $houseNumber;

    /**
     * @var string|null State (ISO 3166-2 subdivisions), only if country=US, CA, CN, JP, MX, BR, AR, ID, TH, IN.
     */
    #[SerializedName('state')]
    protected ?string $state;

    /**
     * @var string|null Street name
     */
    #[SerializedName('street')]
    protected ?string $street;

    /**
     * @var string|null Zip code
     */
    #[SerializedName('zip')]
    protected ?string $zip;

    /**
     * @var PersonalName|null Name details of the customer
     */
    #[SerializedName('name')]
    protected ?PersonalName $name;

    public function __construct(
        ?string $additionalInfo = null,
        ?string $city = null,
        ?string $countryCode = null,
        ?string $houseNumber = null,
        ?string $state = null,
        ?string $street = null,
        ?string $zip = null,
        ?PersonalName $name = null
    ) {
        $this->additionalInfo = $additionalInfo;
        $this->city = $city;
        $this->countryCode = $countryCode;
        $this->houseNumber = $houseNumber;
        $this->state = $state;
        $this->street = $street;
        $this->zip = $zip;
        $this->name = $name;
    }

    // Getters and Setters
    public function getAdditionalInfo(): ?string
    {
        return $this->additionalInfo;
    }

    public function setAdditionalInfo(?string $additionalInfo): self
    {
        $this->additionalInfo = $additionalInfo;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(?string $houseNumber): self
    {
        $this->houseNumber = $houseNumber;
        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;
        return $this;
    }

    public function getName(): ?PersonalName
    {
        return $this->name;
    }

    public function setName(?PersonalName $name): self
    {
        $this->name = $name;
        return $this;
    }
}

<?php

namespace PayoneCommercePlatform\Sdk\Models\ApplePay;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * The result of authorizing a payment request that contains payment information.
 *
 * Data in ApplePayPaymentToken is encrypted. Billing and shipping contact data are not encrypted.
 */
class ApplePayPaymentContact
{
    /**
     * @var string|null A phone number for the contact.
     */
    #[SerializedName('phoneNumber')]
    protected ?string $phoneNumber;

    /**
     * @var string|null An email address for the contact.
     */
    #[SerializedName('emailAddress')]
    protected ?string $emailAddress;

    /**
     * @var string|null The contact’s given name.
     */
    #[SerializedName('givenName')]
    protected ?string $givenName;

    /**
     * @var string|null The contact’s family name.
     */
    #[SerializedName('familyName')]
    protected ?string $familyName;

    /**
     * @var string|null The phonetic spelling of the contact’s given name.
     */
    #[SerializedName('phoneticGivenName')]
    protected ?string $phoneticGivenName;


    /**
     * @var string|null The phonetic spelling of the contact’s family name.
     */
    #[SerializedName('phoneticFamilyName')]
    protected ?string $phoneticFamilyName;

    /**
     * @var array<string>|null The street portion of the address for the contact.
     */
    #[SerializedName('addressLines')]
    protected ?array $addressLines;

    /**
     * @var string|null The city for the contact.
     */
    #[SerializedName('locality')]
    protected ?string $locality;

    /**
     * @var string|null The zip code or postal code, where applicable, for the contact.
     */
    #[SerializedName('postalCode')]
    protected ?string $postalCode;

    /**
     * @var string|null The state for the contact.
     */
    #[SerializedName('administrativeArea')]
    protected ?string $administrativeArea;

    /**
     * @var string|null The subadministrative area (such as a county or other region) in a postal address.
     */
    #[SerializedName('subAdministrativeArea')]
    protected ?string $subAdministrativeArea;

    /**
     * @var string|null The name of the country or region for the contact.
     */
    #[SerializedName('country')]
    protected ?string $country;

    /**
     * @var string|null The contact’s two-letter ISO 3166 country code.
     */
    #[SerializedName('countryCode')]
    protected ?string $countryCode;

    /**
      * @param string|null $emailAddress An email address for the contact.
      * @param string|null $givenName The contact’s given name.
      * @param string|null $familyName The contact’s family name.
      * @param string|null $phoneNumber A phone number for the contact.
      * @param string|null $phoneticGivenName The phonetic spelling of the contact’s given name.
      * @param string|null $phoneticFamilyName The phonetic spelling of the contact’s family name.
      * @param array<string>|null $addressLines The street portion of the address for the contact.
      * @param string|null $locality The city for the contact.
      * @param string|null $postalCode The zip code or postal code, where applicable, for the contact.
      * @param string|null $administrativeArea The state for the contact.
      * @param string|null $subAdministrativeArea The subadministrative area (such as a county or other region) in a postal address.
      * @param string|null $country The name of the country or region for the contact.
      * @param string|null $countryCode The contact’s two-letter ISO 3166 country code.
      */
    public function __construct(
        ?string $emailAddress = null,
        ?string $givenName = null,
        ?string $familyName = null,
        ?string $phoneNumber = null,
        ?string $phoneticGivenName = null,
        ?string $phoneticFamilyName = null,
        ?array $addressLines = null,
        ?string $locality = null,
        ?string $postalCode = null,
        ?string $administrativeArea = null,
        ?string $subAdministrativeArea = null,
        ?string $country = null,
        ?string $countryCode = null
    ) {
        $this->emailAddress = $emailAddress;
        $this->givenName = $givenName;
        $this->familyName = $familyName;
        $this->phoneNumber = $phoneNumber;
        $this->phoneticGivenName = $phoneticGivenName;
        $this->phoneticFamilyName = $phoneticFamilyName;
        $this->addressLines = $addressLines;
        $this->locality = $locality;
        $this->postalCode = $postalCode;
        $this->administrativeArea = $administrativeArea;
        $this->subAdministrativeArea = $subAdministrativeArea;
        $this->country = $country;
        $this->countryCode = $countryCode;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(?string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    public function setGivenName(?string $givenName): self
    {
        $this->givenName = $givenName;
        return $this;
    }

    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    public function setFamilyName(?string $familyName): self
    {
        $this->familyName = $familyName;
        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getPhoneticGivenName(): ?string
    {
        return $this->phoneticGivenName;
    }

    public function setPhoneticGivenName(?string $phoneticGivenName): self
    {
        $this->phoneticGivenName = $phoneticGivenName;
        return $this;
    }

    public function getPhoneticFamilyName(): ?string
    {
        return $this->phoneticFamilyName;
    }

    public function setPhoneticFamilyName(?string $phoneticFamilyName): self
    {
        $this->phoneticFamilyName = $phoneticFamilyName;
        return $this;
    }

    /**
      * Get street portion of the address for the contact.
      *
      * @return array<string>|null
      */
    public function getAddressLines(): ?array
    {
        return $this->addressLines;
    }

    /**
      * @param array<string>|null $addressLines The street portion of the address for the contact.
      */
    public function setAddressLines(?array $addressLines): self
    {
        $this->addressLines = $addressLines;
        return $this;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(?string $locality): self
    {
        $this->locality = $locality;
        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    public function getAdministrativeArea(): ?string
    {
        return $this->administrativeArea;
    }

    public function setAdministrativeArea(?string $administrativeArea): self
    {
        $this->administrativeArea = $administrativeArea;
        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;
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
}

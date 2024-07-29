<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\CompanyInformation;
use PayoneCommercePlatform\Sdk\Models\Address;
use PayoneCommercePlatform\Sdk\Models\ContactDetails;
use PayoneCommercePlatform\Sdk\Models\PersonalInformation;

/**
 * @description Object containing the details of a customer.
 */
class Customer
{
    /**
     * @var CompanyInformation|null Information about the company.
     */
    #[SerializedName('companyInformation')]
    protected ?CompanyInformation $companyInformation;

    /**
     * @var string|null Unique identifier for the customer.
     */
    #[SerializedName('merchantCustomerId')]
    protected ?string $merchantCustomerId;

    /**
     * @var Address|null The billing address of the customer.
     */
    #[SerializedName('billingAddress')]
    protected ?Address $billingAddress;

    /**
     * @var ContactDetails|null Contact details of the customer.
     */
    #[SerializedName('contactDetails')]
    protected ?ContactDetails $contactDetails;

    /**
     * @var string|null Fiscal registration number of the customer or the tax registration number of the company for a business customer.
     */
    #[SerializedName('fiscalNumber')]
    protected ?string $fiscalNumber;

    /**
     * @var string|null Business relation to the customer.
     */
    #[SerializedName('businessRelation')]
    protected ?string $businessRelation;

    /**
     * @var string|null The locale that the customer should be addressed in (for 3rd parties).
     */
    #[SerializedName('locale')]
    protected ?string $locale;

    /**
     * @var PersonalInformation|null Personal information about the customer.
     */
    #[SerializedName('personalInformation')]
    protected ?PersonalInformation $personalInformation;

    public function __construct(
        ?CompanyInformation $companyInformation = null,
        ?string $merchantCustomerId = null,
        ?Address $billingAddress = null,
        ?ContactDetails $contactDetails = null,
        ?string $fiscalNumber = null,
        ?string $businessRelation = null,
        ?string $locale = null,
        ?PersonalInformation $personalInformation = null
    ) {
        $this->companyInformation = $companyInformation;
        $this->merchantCustomerId = $merchantCustomerId;
        $this->billingAddress = $billingAddress;
        $this->contactDetails = $contactDetails;
        $this->fiscalNumber = $fiscalNumber;
        $this->businessRelation = $businessRelation;
        $this->locale = $locale;
        $this->personalInformation = $personalInformation;
    }

    // Getters and Setters
    public function getCompanyInformation(): ?CompanyInformation
    {
        return $this->companyInformation;
    }

    public function setCompanyInformation(?CompanyInformation $companyInformation): self
    {
        $this->companyInformation = $companyInformation;
        return $this;
    }

    public function getMerchantCustomerId(): ?string
    {
        return $this->merchantCustomerId;
    }

    public function setMerchantCustomerId(?string $merchantCustomerId): self
    {
        $this->merchantCustomerId = $merchantCustomerId;
        return $this;
    }

    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?Address $billingAddress): self
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    public function getContactDetails(): ?ContactDetails
    {
        return $this->contactDetails;
    }

    public function setContactDetails(?ContactDetails $contactDetails): self
    {
        $this->contactDetails = $contactDetails;
        return $this;
    }

    public function getFiscalNumber(): ?string
    {
        return $this->fiscalNumber;
    }

    public function setFiscalNumber(?string $fiscalNumber): self
    {
        $this->fiscalNumber = $fiscalNumber;
        return $this;
    }

    public function getBusinessRelation(): ?string
    {
        return $this->businessRelation;
    }

    public function setBusinessRelation(?string $businessRelation): self
    {
        $this->businessRelation = $businessRelation;
        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;
        return $this;
    }

    public function getPersonalInformation(): ?PersonalInformation
    {
        return $this->personalInformation;
    }

    public function setPersonalInformation(?PersonalInformation $personalInformation): self
    {
        $this->personalInformation = $personalInformation;
        return $this;
    }
}

<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class PaymentProduct840CustomerAccountForIntent
{
    #[SerializedName('companyName')]
    protected ?string $companyName;
    #[SerializedName('firstName')]
    protected ?string $firstName;
    #[SerializedName('surname')]
    protected ?string $surname;
    #[SerializedName('emailAddress')]
    protected ?string $emailAddress;

    public function __construct(?string $companyName = null, ?string $firstName = null, ?string $surname = null, ?string $emailAddress = null)
    {
        $this->companyName = $companyName;
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->emailAddress = $emailAddress;
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
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }
    public function getSurname(): ?string
    {
        return $this->surname;
    }
    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;
        return $this;
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
}

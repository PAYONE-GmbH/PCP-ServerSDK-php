<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing the details of the PayPal account.
 */
class PaymentProduct840CustomerAccount
{
    /**
     * @var string|null Name of the company in case the PayPal account is owned by a business.
     */
    #[SerializedName('companyName')]
    protected ?string $companyName;

    /**
     * @var string|null First name of the PayPal account holder.
     */
    #[SerializedName('firstName')]
    protected ?string $firstName;

    /**
     * @var string|null The unique identifier of a PayPal account and will never change in the life cycle of a PayPal account.
     */
    #[SerializedName('payerId')]
    protected ?string $payerId;

    /**
     * @var string|null Surname of the PayPal account holder.
     */
    #[SerializedName('surname')]
    protected ?string $surname;

    public function __construct(
        ?string $companyName = null,
        ?string $firstName = null,
        ?string $payerId = null,
        ?string $surname = null
    ) {
        $this->companyName = $companyName;
        $this->firstName = $firstName;
        $this->payerId = $payerId;
        $this->surname = $surname;
    }

    // Getters and Setters
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

    public function getPayerId(): ?string
    {
        return $this->payerId;
    }

    public function setPayerId(?string $payerId): self
    {
        $this->payerId = $payerId;
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
}

<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing contact details like email address and phone number.
 */
class ContactDetails
{
    /**
     * @var string|null Email address of the customer.
     */
    #[SerializedName('emailAddress')]
    protected ?string $emailAddress;

    /**
     * @var string|null Phone number of the customer.
     */
    #[SerializedName('phoneNumber')]
    protected ?string $phoneNumber;

    public function __construct(
        ?string $emailAddress = null,
        ?string $phoneNumber = null
    ) {
        $this->emailAddress = $emailAddress;
        $this->phoneNumber = $phoneNumber;
    }

    // Getters and Setters
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(?string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;
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
}

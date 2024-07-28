<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use PayoneCommercePlatform\Sdk\Models\PersonalName;

/**
 * @description Object containing personal information like name, date of birth and gender.
 */
class PersonalInformation
{
    /**
     * @var string|null The date of birth of the customer or the recipient of the loan. Format YYYYMMDD.
     */
    #[SerializedName('dateOfBirth')]
    protected ?string $dateOfBirth;

    /**
     * @var string|null The gender of the customer.
     */
    #[SerializedName('gender')]
    protected ?string $gender;

    /**
     * @var PersonalName|null The name of the customer.
     */
    #[SerializedName('name')]
    protected ?PersonalName $name;

    public function __construct(
        ?string $dateOfBirth = null,
        ?string $gender = null,
        ?PersonalName $name = null
    ) {
        $this->dateOfBirth = $dateOfBirth;
        $this->gender = $gender;
        $this->name = $name;
    }

    // Getters and Setters
    public function getDateOfBirth(): ?string
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?string $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;
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

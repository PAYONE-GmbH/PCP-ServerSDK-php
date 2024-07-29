<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class PersonalName
{
    /**
     * @var string|null Given name(s) or first name(s) of the customer
     */
    #[SerializedName('firstName')]
    protected ?string $firstName;

    /**
     * @var string|null Surname(s) or last name(s) of the customer
     */
    #[SerializedName('surname')]
    protected ?string $surname;

    /**
     * @var string|null Title of customer
     */
    #[SerializedName('title')]
    protected ?string $title;

    public function __construct(
        ?string $firstName = null,
        ?string $surname = null,
        ?string $title = null
    ) {
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->title = $title;
    }

    // Getters and Setters
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }
}

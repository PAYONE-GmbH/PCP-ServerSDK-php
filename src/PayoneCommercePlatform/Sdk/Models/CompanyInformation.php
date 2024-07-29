<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing details of the company.
 */
class CompanyInformation
{
    /**
     * @var string|null Name of company from a customer perspective.
     */
    #[SerializedName('name')]
    protected ?string $name;

    public function __construct(
        ?string $name = null
    ) {
        $this->name = $name;
    }

    // Getters and Setters
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }
}

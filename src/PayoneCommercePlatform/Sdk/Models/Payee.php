<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class Payee
{
    /**
     * @var string
     */
    #[SerializedName('iban')]
    protected string $iban;

    /**
     * @var string|null
     */
    #[SerializedName('bic')]
    protected ?string $bic;

    /**
     * @var string
     */
    #[SerializedName('name')]
    protected string $name;

    public function __construct(
        string $name,
        string $iban,
        ?string $bic = null
    ) {
        $this->name = $name;
        $this->iban = $iban;
        $this->bic = $bic;
    }

    // Getters and Setters
    public function getIban(): string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;
        return $this;
    }


    public function getBic(): ?string
    {
        return $this->bic;
    }

    public function setBic(?string $bic): self
    {
        $this->bic = $bic;
        return $this;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}

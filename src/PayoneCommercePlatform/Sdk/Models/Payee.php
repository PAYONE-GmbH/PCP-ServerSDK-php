<?php

namespace PayoneCommercePlatform\Sdk\Models;

class Payee
{
    /**
     * @var string
     */
    private $iban;

    /**
     * @var string|null
     */
    private $bic;

    /**
     * @var string
     */
    private $name;

    public function __construct(
        string $name,
        string $iban,
        ?string $bic = null
    ) {
        $this->name = $name;
        $this->iban = $iban;
        $this->bic = $bic;
    }

    /**
     * @return string
     */
    public function getIban(): string
    {
        return $this->iban;
    }

    /**
     * @return string|null
     */
    public function getBic(): ?string
    {
        return $this->bic;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}

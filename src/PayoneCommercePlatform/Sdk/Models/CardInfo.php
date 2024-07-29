<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing additional non PCI DSS relevant card information. Used instead of card (missing fields: cardNumber, expiryDate, cvv).
 */
class CardInfo
{
    /**
     * @var string|null The card holder's name on the card.
     */
    #[SerializedName('cardholderName')]
    protected ?string $cardholderName;

    public function __construct(
        ?string $cardholderName = null
    ) {
        $this->cardholderName = $cardholderName;
    }

    // Getters and Setters
    public function getCardholderName(): ?string
    {
        return $this->cardholderName;
    }

    public function setCardholderName(?string $cardholderName): self
    {
        $this->cardholderName = $cardholderName;
        return $this;
    }
}

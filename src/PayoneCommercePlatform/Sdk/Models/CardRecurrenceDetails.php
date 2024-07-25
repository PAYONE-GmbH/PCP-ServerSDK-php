<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
*  * @description Object containing data related to recurring.
*   */
class CardRecurrenceDetails
{
    /**
      * @var string|null * first = This transaction is the first of a series of recurring transactions
      * recurring = This transaction is a subsequent transaction in a series of recurring transactions
      *
      * Note: For any first of a recurring the system will automatically create a token as you will need to use a
      * token for any subsequent recurring transactions. In case a token already exists this is indicated in the
      * response with a value of False for the isNewToken property in the response.
      */
    #[SerializedName('recurringPaymentSequenceIndicator')]
    protected ?string $recurringPaymentSequenceIndicator;

    public function __construct(
        ?string $recurringPaymentSequenceIndicator = null
    ) {
        $this->recurringPaymentSequenceIndicator = $recurringPaymentSequenceIndicator;
    }

    // Getters and Setters
    public function getRecurringPaymentSequenceIndicator(): ?string
    {
        return $this->recurringPaymentSequenceIndicator;
    }

    public function setRecurringPaymentSequenceIndicator(?string $recurringPaymentSequenceIndicator): self
    {
        $this->recurringPaymentSequenceIndicator = $recurringPaymentSequenceIndicator;
        return $this;
    }
}

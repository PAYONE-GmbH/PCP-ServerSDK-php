<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * @description Object that contains the action, including the needed data, that you should perform next, like showing instructions, showing the transaction results or redirect to a third party to complete the payment.
 */
class MerchantAction
{
    /**
     * @var ActionType|null Action merchants needs to take in the online payment process.
     */
    #[SerializedName('actionType')]
    protected ?ActionType $actionType;

    /**
     * @var RedirectData|null Details for redirecting the customer.
     */
    #[SerializedName('redirectData')]
    protected ?RedirectData $redirectData;

    public function __construct(
        ?ActionType $actionType = null,
        ?RedirectData $redirectData = null
    ) {
        $this->actionType = $actionType;
        $this->redirectData = $redirectData;
    }

    // Getters and Setters
    public function getActionType(): ?ActionType
    {
        return $this->actionType;
    }

    public function setActionType(?ActionType $actionType): self
    {
        $this->actionType = $actionType;
        return $this;
    }

    public function getRedirectData(): ?RedirectData
    {
        return $this->redirectData;
    }

    public function setRedirectData(?RedirectData $redirectData): self
    {
        $this->redirectData = $redirectData;
        return $this;
    }
}

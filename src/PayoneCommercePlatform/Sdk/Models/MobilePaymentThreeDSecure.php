<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing specific data regarding 3D Secure for card digital wallets.
 * Necessary to perform 3D Secure when there is no liability shift from the wallet and corresponding card network.
 */
class MobilePaymentThreeDSecure
{
    /**
     * @var RedirectionData|null Data required for redirection during 3D Secure authentication.
     */
    #[SerializedName('redirectionData')]
    protected ?string $redirectionData;


    public function __construct(?RedirectionData $redirectionData)
    {
        $this->redirectionData = $redirectionData;
    }

    // Getters and Setters
    public function getRedirectionData(): ?RedirectionData
    {
        return $this->redirectionData;
    }

    public function setRedirectionData(?RedirectionData $redirectionData): self
    {
        $this->redirectionData = $redirectionData;
        return $this;
    }
}

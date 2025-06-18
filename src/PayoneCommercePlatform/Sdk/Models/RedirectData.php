<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description Object containing all data needed to redirect the customer.
 */
class RedirectData
{
    /**
     * @var string|null The URL that the customer should be redirected to. Be sure to redirect using the GET method.
     */
    #[SerializedName('returnUrl')]
    protected ?string $returnUrl;

    public function __construct(
        ?string $returnUrl = null
    ) {
        $this->returnUrl = $returnUrl;
    }

    // Getters and Setters
    public function getReturnUrl(): ?string
    {
        return $this->returnUrl;
    }

    public function setReturnUrl(?string $returnUrl): self
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }
}

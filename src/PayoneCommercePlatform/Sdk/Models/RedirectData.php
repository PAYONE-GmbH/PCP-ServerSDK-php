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
    #[SerializedName('redirectURL')]
    protected ?string $redirectURL;

    public function __construct(
        ?string $redirectURL = null
    ) {
        $this->redirectURL = $redirectURL;
    }

    // Getters and Setters
    public function getRedirectURL(): ?string
    {
        return $this->redirectURL;
    }

    public function setRedirectURL(?string $redirectURL): self
    {
        $this->redirectURL = $redirectURL;
        return $this;
    }
}

<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @description 3D Secure results object
 */
class ThreeDSecureResults
{
    /**
     * @var string|null 3D Secure Protocol version used during this transaction.
     */
    #[SerializedName('version')]
    protected ?string $version;

    /**
     * @var string|null 3D Secure ECI (Electronic Commerce Indicator) depending on the Scheme. Returned by DS.
     */
    #[SerializedName('schemeEci')]
    protected ?string $schemeEci;

    /**
     * @var string|null Exemption requested and applied in the authorization. Possible values: low-value, merchant-acquirer-transaction-risk-analysis
     */
    #[SerializedName('appliedExemption')]
    protected ?string $appliedExemption;

    public function __construct(
        ?string $version = null,
        ?string $schemeEci = null,
        ?string $appliedExemption = null
    ) {
        $this->version = $version;
        $this->schemeEci = $schemeEci;
        $this->appliedExemption = $appliedExemption;
    }

    // Getters and Setters
    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function getSchemeEci(): ?string
    {
        return $this->schemeEci;
    }

    public function setSchemeEci(?string $schemeEci): self
    {
        $this->schemeEci = $schemeEci;
        return $this;
    }

    public function getAppliedExemption(): ?string
    {
        return $this->appliedExemption;
    }

    public function setAppliedExemption(?string $appliedExemption): self
    {
        $this->appliedExemption = $appliedExemption;
        return $this;
    }
}

<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Attribute\SerializedName;

class FundSplitRequest
{
    #[SerializedName('fundSplit')]
    protected FundSplit $fundSplit;

    public function __construct(FundSplit $fundSplit)
    {
        $this->fundSplit = $fundSplit;
    }

    public function getFundSplit(): FundSplit
    {
        return $this->fundSplit;
    }

    public function setFundSplit(FundSplit $fundSplit): self
    {
        $this->fundSplit = $fundSplit;
        return $this;
    }
}

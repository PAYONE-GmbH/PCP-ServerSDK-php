<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use PayoneCommercePlatform\Sdk\Api\CommerceCaseApi;

class CommerceCaseApiClient extends CommerceCaseApi
{
    use ClientTrait;

    /**
     * @inheritDoc
     */
    public function createCommerceCaseRequest($merchantId, $createCommerceCaseRequest, string $contentType = self::contentTypes['createCommerceCase'][0])
    {
        $request = parent::createCommerceCaseRequest($merchantId, $createCommerceCaseRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function getCommerceCaseRequest($merchantId, $commerceCaseId, string $contentType = self::contentTypes['getCommerceCase'][0])
    {
        $request = parent::getCommerceCaseRequest($merchantId, $commerceCaseId, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function getCommerceCasesRequest($merchantId, $offset = 0, $size = 25, $fromDate = null, $toDate = null, $commerceCaseId = null, $merchantReference = null, $merchantCustomerId = null, $includeCheckoutStatus = null, $includePaymentChannel = null, string $contentType = self::contentTypes['getCommerceCases'][0])
    {
        $request = parent::getCommerceCasesRequest($merchantId, $offset, $size, $fromDate, $toDate, $commerceCaseId, $merchantReference, $merchantCustomerId, $includeCheckoutStatus, $includePaymentChannel, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function updateCommerceCaseRequest($merchantId, $commerceCaseId, $customer, string $contentType = self::contentTypes['updateCommerceCase'][0])
    {
        $request = parent::updateCommerceCaseRequest($merchantId, $commerceCaseId, $customer, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

}
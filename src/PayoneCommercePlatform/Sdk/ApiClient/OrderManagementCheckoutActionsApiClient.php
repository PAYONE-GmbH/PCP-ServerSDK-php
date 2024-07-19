<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use PayoneCommercePlatform\Sdk\Api\OrderManagementCheckoutActionsApi;
use GuzzleHttp\Psr7\Request;

class OrderManagementCheckoutActionsApiClient extends OrderManagementCheckoutActionsApi
{
    use ClientTrait;

    /**
     * @inheritDoc
     */
    public function cancelOrderRequest($merchantId, $commerceCaseId, $checkoutId, $cancelRequest = null, string $contentType = self::contentTypes['cancelOrder'][0]): Request
    {
        $request = parent::cancelOrderRequest($merchantId, $commerceCaseId, $checkoutId, $cancelRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function completeOrderRequest($merchantId, $commerceCaseId, $checkoutId, $completeOrderRequest, string $contentType = self::contentTypes['completeOrder'][0]): Request
    {
        $request = parent::completeOrderRequest($merchantId, $commerceCaseId, $checkoutId, $completeOrderRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function createOrderRequest($merchantId, $commerceCaseId, $checkoutId, $orderRequest, string $contentType = self::contentTypes['createOrder'][0]): Request
    {
        $request = parent::createOrderRequest($merchantId, $commerceCaseId, $checkoutId, $orderRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function deliverOrderRequest($merchantId, $commerceCaseId, $checkoutId, $deliverRequest, string $contentType = self::contentTypes['deliverOrder'][0]): Request
    {
        $request = parent::deliverOrderRequest($merchantId, $commerceCaseId, $checkoutId, $deliverRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }

    /**
     * @inheritDoc
     */
    public function returnOrderRequest($merchantId, $commerceCaseId, $checkoutId, $returnRequest = null, string $contentType = self::contentTypes['returnOrder'][0]): Request
    {
        $request = parent::returnOrderRequest($merchantId, $commerceCaseId, $checkoutId, $returnRequest, $contentType);

        return $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
    }
}


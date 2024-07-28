<?php

namespace PayoneCommercePlatform\Sdk;

use GuzzleHttp\Psr7\Request;

class RequestHeaderGenerator
{
    public const SDK_VERSION = '0.0.1';

    public const AUTHORIZATION_ID = 'GCS';

    public const DATE_RFC2616 = 'D, d M Y H:i:s T';

    public const AUTHORIZATION_TYPE = 'v1HMAC';

    public const HASH_ALGORITHM = 'sha256';

    /**
     * @param CommunicatorConfiguration $communicatorConfiguration
     */
    public function __construct(private CommunicatorConfiguration $communicatorConfiguration)
    {
    }

    public function generateAdditionalRequestHeaders(Request $request): Request
    {
        if(!$request->hasHeader('Date')) {
            $request = $request->withAddedHeader('Date', $this->getRfc161Date());
        }
        if(!$request->hasHeader('X-GCS-ServerMetaInfo')) {
            $request = $request->withAddedHeader('X-GCS-ServerMetaInfo', $this->getServerMetaInfoValue());
        }

        $clientMetaInfo = $this->communicatorConfiguration->getClientMetaInfo();
        if (!$request->hasHeader('X-GCS-ClientMetaInfo') && !empty($clientMetaInfo)) {
            $json = json_encode($clientMetaInfo);
            if (!$json) {
                throw new \InvalidArgumentException('ClientMetaInfo is not a valid JSON');
            }
            $request = $request->withAddedHeader('X-GCS-ClientMetaInfo', base64_encode($json));
        }

        if(!$request->hasHeader('Authorization')) {
            $request = $request->withAddedHeader('Authorization', $this->getAuthorizationHeaderValue($request));
        }

        return $request;
    }

    /**
     * @return string
     */
    protected function getRfc161Date(): string
    {
        return gmdate(static::DATE_RFC2616);
    }

    protected function getServerMetaInfoValue(): string
    {
        $serverMetaInfo = [
            "platformIdentifier" => sprintf('%s; php version %s', php_uname(), phpversion()),
            "sdkIdentifier"      => 'PHPServerSDK/v'.static::SDK_VERSION,
            "sdkCreator"         => 'PAYONE GmbH'
        ];

        $integrator = $this->communicatorConfiguration->getIntegrator();
        if (!is_null($integrator)) {
            $serverMetaInfo["integrator"] = $integrator;
        }
        // the sdkIdentifier contains a /. Without the JSON_UNESCAPED_SLASHES, this is turned to \/ in JSON.
        $json = json_encode($serverMetaInfo, JSON_UNESCAPED_SLASHES);
        // assert json_encode succeeded
        if (!$json) {
            throw new \LogicException('ServerMetaInfo is not a valid JSON');
        }

        return base64_encode($json);
    }

    /**
     * @param Request $request
     * @return string
     */
    protected function getAuthorizationHeaderValue(Request $request): string
    {
        $apiSecret = $this->communicatorConfiguration->getApiSecret();

        return
            static::AUTHORIZATION_ID . ' ' . static::AUTHORIZATION_TYPE . ':' .
            $this->communicatorConfiguration->getApiKey() . ':' .
            base64_encode(
                hash_hmac(
                    static::HASH_ALGORITHM,
                    $this->getSignData($request),
                    $apiSecret,
                    true
                )
            );
    }

    /**
     * @param Request $request
     * @return string
     */
    protected function getSignData(Request $request): string
    {
        $signData = $request->getMethod() . "\n";
        $requestHeaders = $request->getHeaders();
        if (isset($requestHeaders['Content-Type'])) {
            $signData .= reset($requestHeaders['Content-Type']) . "\n";
        } else {
            $signData .= "\n";
        }
        if (isset($requestHeaders['Date'])) {
            $signData .= reset($requestHeaders['Date']) . "\n";
        } else {
            $signData .= "\n";
        }
        $gcsHeaders = [];
        foreach ($requestHeaders as $headerKey => $headerValue) {
            if (preg_match('/X-GCS/i', $headerKey)) {
                $gcsHeaders[$headerKey] = reset($headerValue);
            }
        }
        ksort($gcsHeaders);
        foreach ($gcsHeaders as $gcsHeaderKey => $gcsHeaderValue) {
            // @phpstan-ignore-next-line
            $gcsEncodedHeaderValue = trim(preg_replace('/\r?\n[\h]*/', ' ', $gcsHeaderValue));

            $signData .= strtolower($gcsHeaderKey) . ':' . $gcsEncodedHeaderValue . "\n";
        }
        $uri = $request->getUri();
        $signData .= $uri->getPath() . ($uri->getQuery() ? "?{$uri->getQuery()}" : '') . "\n";

        return $signData;
    }
}

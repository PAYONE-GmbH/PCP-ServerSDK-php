<?php

namespace PayoneCommercePlatform\Sdk;

class CommunicatorConfiguration
{
    public const SDK_VERSION = '0.0.1';

    /**
     * Api key for the PAYONE Commerce Platform
     *
     * @var string
     */
    protected string $apiKey;

    /**
     * Api secret for the PAYONE Commerce Platform
     *
     * @var string
     */
    protected string $apiSecret;

    /**
     * Info about the integrator using the SDK
     *
     * @var string
     */
    protected ?string $integrator;

    /**
     * The host
     *
     * @var string
     */
    protected string $host;

    /**
     * User agent of the HTTP request, set to "OpenAPI-Generator/{version}/PHP" by default
     *
     * @var string
     */
    protected string $userAgent = 'OpenAPI-Generator/1.0.0/PHP';

    /**
     * Server meta info used on the PAYONE commerce platform. Should include 3 fields:
     *  - `platformIdentifier`: the OS name, the language name (PHP) and the PHP version.
     *  - `sdkIdentifier`: name of the SDK package and its version
     *  - `sdkCreator`: PAYONE GmbH
     *
     * @var array<string, string>
     */
    protected array $serverMetaInfo;

    /**
     * Client meta info used on the PAYONE commerce platform
     *
     * @var array<string, string>
     */
    protected array $clientMetaInfo;

    /**
     * Debug switch (default set to false)
     *
     * @var bool
     */
    protected bool $debug;

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected string $debugFile;

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected string $tempFolderPath;

    /**
     * Constructor
     *
     * @param string                  $apiKey
     * @param string                  $apiSecret
     * @param string                  $host
     * @param string|null             $integrator
     * @param array<string, string>   $serverMetaInfo
     * @param array<string, string>   $clientMetaInfo
     * @param bool                    $debug
     * @param string                  $debugFile
     */
    public function __construct(
        string              $apiKey,
        string              $apiSecret,
        ?string             $host = null,
        ?string             $integrator = null,
        ?array              $serverMetaInfo = null,
        ?array              $clientMetaInfo = null,
        bool                $debug = false,
        string              $debugFile = 'php://output'
    ) {
        $this->tempFolderPath = sys_get_temp_dir();

        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        if ($host === null) {
            $this->setHost(self::getPredefinedHosts()['prod']['url']);
        } else {
            $this->setHost($host);
        }
        $this->integrator = $integrator;
        $this->serverMetaInfo = $serverMetaInfo !== null ? $serverMetaInfo : [
            "platformIdentifier" => sprintf('%s; php version %s', php_uname(), phpversion()),
            "sdkIdentifier"      => 'PHPServerSDK/v'.static::SDK_VERSION,
            "sdkCreator"         => 'PAYONE GmbH'
        ];
        $this->clientMetaInfo = $clientMetaInfo !== null ? $clientMetaInfo : [];
        $this->debug = $debug;
        $this->debugFile = $debugFile;
    }

    /**
     * Sets the API key
     *
     * @param string $apiKey apiKey
     *
     * @return $this
     */
    public function setApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * Gets the API key
     *
     * @return string API key
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * Sets the API secret
     *
     * @param string $apiSecret apiSecret
     *
     * @return $this
     */
    public function setApiSecret(string $apiSecret): self
    {
        $this->apiSecret = $apiSecret;
        return $this;
    }

    /**
     * Gets the API secret
     *
     * @return string API secret
     */
    public function getApiSecret(): string
    {
        return $this->apiSecret;
    }

    /**
     * Gets the integrator info
     *
     * @return string API secret
     */
    public function getIntegrator(): ?string
    {
        return $this->integrator;
    }

    /**
     * Sets the integrator info
     *
     * @return $this
     */
    public function setIntegrator(?string $integrator): self
    {
        $this->integrator = $integrator;
        return $this;
    }

    /**
     * Sets the host
     *
     * @param string $host Host
     *
     * @return $this
     */
    public function setHost(string $host): self
    {

        // url are constructed by string concatenation and no trailing slashis assumed
        // we need to remove trailing slash
        if (str_ends_with($host, '/')) {
            $host = substr($host, 0, -1);
        }
        $this->host = $host;
        return $this;
    }

    /**
     * Gets the host
     *
     * @return string Host
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Sets the user agent of the api client
     *
     * @param string $userAgent the user agent of the api client
     *
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * Gets the user agent of the api client
     *
     * @return string user agent
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * Gets client meta info
     *
     * @return array<string, string>
     */
    public function getClientMetaInfo(): array
    {
        return $this->clientMetaInfo;
    }

    /**
     * Sets client meta info
     *
     * @param array<string, string> $clientMetaInfo client meta info send to PAYONE Commerce Platform
     * @return $this
     */
    public function setClientMetaInfo(array $clientMetaInfo): self
    {
        $this->clientMetaInfo = $clientMetaInfo;
        return $this;
    }

    /**
     * Adds an entry to client meta info
     *
     * @return $this
     */
    public function addClientMetaInfo(string $key, string $value): self
    {
        $this->clientMetaInfo[$key] = $value;
        return $this;
    }

    /**
     * Gets server meta info
     *
     * @return array<string, string>
     */
    public function getServerMetaInfo(): array
    {
        return $this->serverMetaInfo;
    }

    /**
     * Sets server meta info
     *
     * @param array<string, string> $serverMetaInfo server meta info send to PAYONE Commerce Platform
     * @return $this
     */
    public function setServerMetaInfo(array $serverMetaInfo): self
    {
        $this->serverMetaInfo = $serverMetaInfo;
        return $this;
    }

    /**
     * Adds an entry to server meta info
     *
     * @return $this
     */
    public function addServerMetaInfo(string $key, string $value): self
    {
        $this->serverMetaInfo[$key] = $value;
        return $this;
    }

    /**
     * Sets debug flag
     *
     * @param bool $debug Debug flag
     *
     * @return $this
     */
    public function setDebug(bool $debug): self
    {
        $this->debug = $debug;
        return $this;
    }

    /**
     * Gets the debug flag
     *
     * @return bool
     */
    public function getDebug(): bool
    {
        return $this->debug;
    }

    /**
     * Sets the debug file
     *
     * @param string $debugFile Debug file
     *
     * @return $this
     */
    public function setDebugFile(string $debugFile): self
    {
        $this->debugFile = $debugFile;
        return $this;
    }

    /**
     * Gets the debug file
     *
     * @return string
     */
    public function getDebugFile(): string
    {
        return $this->debugFile;
    }

    /**
     * Sets the temp folder path
     *
     * @param string $tempFolderPath Temp folder path
     *
     * @return $this
     */
    public function setTempFolderPath(string $tempFolderPath): self
    {
        $this->tempFolderPath = $tempFolderPath;
        return $this;
    }

    /**
     * Gets the temp folder path
     *
     * @return string Temp folder path
     */
    public function getTempFolderPath(): string
    {
        return $this->tempFolderPath;
    }

    /**
     * Returns an array of host settings
     *
     * @return array<string, array{url: string, description: string}> an array of host settings
     */
    public static function getPredefinedHosts(): array
    {
        return [
            "prod" => [
                "url" => "https://commerce-api.payone.com",
                "description" => "Production URL",
            ],
            "preprod" => [
                "url" => "https://preprod.commerce-api.payone.com",
                "description" => "Pre-Production URL",
            ]
        ];
    }
}

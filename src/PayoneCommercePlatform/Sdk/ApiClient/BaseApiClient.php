<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\HeaderSelector;
use PayoneCommercePlatform\Sdk\ObjectSerializer;
use PayoneCommercePlatform\Sdk\RequestHeaderGenerator;
use PayoneCommercePlatform\Sdk\Domain\ErrorResponse;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;

class BaseApiClient
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var CommunicatorConfiguration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var RequestHeaderGenerator
     */
    protected $requestHeaderGenerator;

    /**
     * @param CommunicatorConfiguration   $config
     * @param ClientInterface             $client
     * @param HeaderSelector              $selector
     */
    public function __construct(
        CommunicatorConfiguration $config,
        ClientInterface $client = null,
        HeaderSelector $selector = null,
    ) {
        $this->config = $config;
        $this->client = $client ?: new Client();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->requestHeaderGenerator = new RequestHeaderGenerator($this->config);
    }

    /**
     * @return CommunicatorConfiguration
     */
    public function getConfig(): CommunicatorConfiguration
    {
        return $this->config;
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption(): array
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }

    /**
      *
      * @param Request  $request  request to send to api
      * @param array    $options  options to use within the \GuzzleHttp\Client;
      * @param string|null   $type     type for deserialization
      *
      * @return array   deserialized object, status code, response headers
      */
    protected function makeApiCall(Request $request, ?string $type = null): array
    {
        $request = $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
        $options = $this->createHttpClientOption();

        try {
            $response = $this->client->send($request, $options);
            $this->handleError($response);
        } catch (RequestException $e) {
            throw new ApiResponseRetrievalException(
                statusCode: (int) $e->getCode(),
                responseBody: $e->getResponse() ? (string) $e->getResponse()->getBody() : "",
                message: "[{$e->getCode()}] {$e->getMessage()}",
                previous: $e,
            );
        } catch (ConnectException $e) {
            throw new ApiResponseRetrievalException(
                statusCode: (int) $e->getCode(),
                message: "[{$e->getCode()}] {$e->getMessage()}",
                previous: $e,
            );
        }

        $this->handleError($response);

        if ($type === null) {
            return [null, $response->getStatusCode(), $response->getHeaders()];
        }

        $contents = "";
        try {
            $contents = $response->getBody()->getContents();
            $decoded = json_decode($contents, false, 512, JSON_THROW_ON_ERROR);
            return [
                ObjectSerializer::deserialize($decoded, $type, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (\JsonException $exception) {
            throw new ApiResponseRetrievalException(
                message: sprintf(
                    'Error JSON decoding server response (%s)',
                    $request->getUri()
                ),
                statusCode: $response->getStatusCode(),
                responseBody: $contents,
                previous: $exception,
            );
        }
    }

    protected function makeAsyncApiCall(Request $request, ?string $type): PromiseInterface
    {
        $request = $this->requestHeaderGenerator->generateAdditionalRequestHeaders($request);
        $options = $this->createHttpClientOption();
        $returnType = $type ?: '';

        return $this->client
          ->sendAsync($request, $options)
          ->then(
              function ($response) use ($returnType) {
                  $this->handleError($response);

                  if ($returnType === '') {
                      return [null, $response->getStatusCode(), $response->getHeaders()];
                  }

                  $contents = "";
                  try {
                      $contents = $response->getBody()->getContents();
                      $decoded = json_decode($contents, false, 512, JSON_THROW_ON_ERROR);
                      return [
                          ObjectSerializer::deserialize($decoded, $returnType, []),
                          $response->getStatusCode(),
                          $response->getHeaders()
                      ];
                  } catch (\JsonException $exception) {
                      throw new ApiResponseRetrievalException(
                          message: 'Error JSON decoding server response',
                          statusCode: $response->getStatusCode(),
                          responseBody: $contents,
                          previous: $exception,
                      );
                  }
              },
              function ($exception) {
                  $response = $exception->getResponse();
                  $statusCode = $response->getStatusCode();
                  throw new ApiResponseRetrievalException(
                      statusCode: $statusCode,
                      message: sprintf('[%d] Error communicating with the API', $statusCode),
                      responseBody: $response->getBody()->getContents(),
                      previous: $exception,
                  );
              }
          );
    }


    protected function handleError(Response $response): void
    {
        $statusCode = (int) ($response->getStatusCode());
        if ($statusCode >= 200 && $statusCode <= 299) {
            return;
        }

        $contents = "";
        try {
            $contents = $response->getBody()->getContents();
            $decoded = json_decode($contents, false, 512, JSON_THROW_ON_ERROR);
            $res = ObjectSerializer::deserialize($decoded, ErrorResponse::class, []);
            if ($res->getErrors() === null || count($res->getErrors()) === 0) {
                throw new ApiResponseRetrievalException(
                    statusCode: $statusCode,
                    message: sprintf("deserialized api errors are empty"),
                    responseBody: $contents,
                );
            } else {
                throw new ApiErrorResponseException(
                    statusCode: $statusCode,
                    responseBody: $contents,
                    errors: $res->getErrors(),
                );
            }
        } catch (\JsonException $exception) {
            throw new ApiResponseRetrievalException(
                statusCode: $statusCode,
                message: sprintf(
                    'Error JSON decoding error server response'
                ),
                responseBody: $contents,
                previous: $exception
            );
        }
    }
}

<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

// needed to allow usage of symfony/serializer
require_once __DIR__.'/../../../../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\HeaderSelector;
use PayoneCommercePlatform\Sdk\RequestHeaderGenerator;
use PayoneCommercePlatform\Sdk\Models\ErrorResponse;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class BaseApiClient
{
    protected const MEDIA_TYPE_JSON = 'application/json';
    protected static Serializer $serializer;
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
        $normalizers = [new GetSetMethodNormalizer(), new DateTimeNormalizer()];
        $encoders = [new JsonEncoder()];

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
     * @return array<string, resource> of http client options
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
      * @template T
      * @param Request                $request  request to send to api
      * @param class-string<T>|null   $type     type for deserialization
      *
      * @return ($type is null ? array{null, int, array<mixed>} : array{T, int, array<mixed>}) [decoded response type or null, status code, headers]
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
                responseBody: "",
                message: "[{$e->getCode()}] {$e->getMessage()}",
                previous: $e,
            );
        }

        $this->handleError($response);

        if ($type === null) {
            return [$type, $response->getStatusCode(), $response->getHeaders()];
        }

        $contents = "";
        try {
            $contents = $response->getBody()->getContents();
            // @phpstan-ignore-next-line
            return [
                self::$serializer->deserialize($contents, $type, 'json'),
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
                          self::$serializer->deserialize($decoded, $returnType, 'json'),
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


    protected function handleError(ResponseInterface $response): void
    {
        $statusCode = (int) ($response->getStatusCode());
        if ($statusCode >= 200 && $statusCode <= 299) {
            return;
        }

        $contents = "";
        try {
            $contents = $response->getBody()->getContents();
            $decoded = json_decode($contents, false, 512, JSON_THROW_ON_ERROR);
            $res = self::$serializer->deserialize($decoded, ErrorResponse::class, 'json');
            if (get_class($res) !== ErrorResponse::class || $res->getErrors() === null || count($res->getErrors()) === 0) {
                throw new ApiResponseRetrievalException(
                    statusCode: $statusCode,
                    message: "failed to retrieve error response or errors are empty",
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

    public static function init(): void
    {
        self::$serializer = new Serializer(
            normalizers: [new GetSetMethodNormalizer(), new ArrayDenormalizer(), new DateTimeNormalizer(), new BackedEnumNormalizer()],
            encoders: [new JsonEncoder()]
        );
    }
}

BaseApiClient::init();

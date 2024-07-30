<?php

namespace PayoneCommercePlatform\Sdk\ApiClient;

// needed to allow usage of symfony/serializer
require_once __DIR__.'/../../../../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;
use PayoneCommercePlatform\Sdk\RequestHeaderGenerator;
use PayoneCommercePlatform\Sdk\Models\ErrorResponse;
use PayoneCommercePlatform\Sdk\Errors\ApiErrorResponseException;
use PayoneCommercePlatform\Sdk\Errors\ApiResponseRetrievalException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
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
     * @var RequestHeaderGenerator
     */
    protected $requestHeaderGenerator;

    /**
     * @param CommunicatorConfiguration   $config
     * @param ClientInterface             $client
     */
    public function __construct(
        CommunicatorConfiguration $config,
        ClientInterface $client = null,
    ) {
        $normalizers = [new GetSetMethodNormalizer(), new DateTimeNormalizer()];
        $encoders = [new JsonEncoder()];

        $this->config = $config;
        $this->client = $client ?: new Client();
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
        try {
            $response = $this->client->send($request, ['http_errors' => false]);
        } catch (RequestException $e) {
            throw new ApiResponseRetrievalException(
                statusCode: (int) $e->getCode(),
                uri: $request->getUri(),
                httpMethod: $request->getMethod(),
                responseBody: $e->getResponse() ? (string) $e->getResponse()->getBody() : "",
                message: "[{$e->getCode()}] {$e->getMessage()}",
                previous: $e,
            );
        } catch (ConnectException $e) {
            throw new ApiResponseRetrievalException(
                statusCode: (int) $e->getCode(),
                uri: $request->getUri(),
                httpMethod: $request->getMethod(),
                responseBody: "",
                message: "[{$e->getCode()}] {$e->getMessage()}",
                previous: $e,
            );
        }

        $this->handleError($request, $response);

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
        } catch (NotEncodableValueException | UnexpectedValueException  $exception) {
            throw new ApiResponseRetrievalException(
                uri: $request->getUri(),
                httpMethod: $request->getMethod(),
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

    protected function handleError(Request $request, ResponseInterface $response): void
    {
        $statusCode = (int) ($response->getStatusCode());
        if ($statusCode >= 200 && $statusCode <= 299) {
            return;
        }

        $contents = "";
        try {
            $contents = $response->getBody()->getContents();
            $res = self::$serializer->deserialize($contents, ErrorResponse::class, 'json');
            if (get_class($res) !== ErrorResponse::class || $res->getErrors() === null || count($res->getErrors()) === 0) {
                throw new ApiResponseRetrievalException(
                    statusCode: $statusCode,
                    uri: $request->getUri(),
                    httpMethod: $request->getMethod(),
                    message: "failed to retrieve error response or errors are empty",
                    responseBody: $contents,
                );
            } else {
                throw new ApiErrorResponseException(
                    statusCode: $statusCode,
                    uri: $request->getUri(),
                    httpMethod: $request->getMethod(),
                    responseBody: $contents,
                    errors: $res->getErrors(),
                );
            }
        } catch (NotEncodableValueException | UnexpectedValueException  $exception) {
            throw new ApiResponseRetrievalException(
                uri: $request->getUri(),
                httpMethod: $request->getMethod(),
                statusCode: $statusCode,
                message: sprintf(
                    'Error JSON decoding error server response'
                ),
                responseBody: $contents,
                previous: $exception
            );
        }
    }

    protected function serialize(mixed $data): string
    {
        // by default an object with all properties set to null, is encoded as `[]`
        // php can't figure out if this is an list of things or an empty associative array
        // so we enforce `{}`
        if (is_object($data)) {
            return self::$serializer->serialize($data, 'json', ['json_encode_options' => JSON_FORCE_OBJECT]);
        }
        return self::$serializer->serialize($data, 'json');
    }

    public static function init(): void
    {
        $phpDocExtractor = new PhpDocExtractor();
        $reflectionExtractor = new ReflectionExtractor();
        // phpstan can't figure out that the exctractors implement the needed interface,
        // probably because it is local variable
        // @phpstan-ignore-next-line
        $propertyTypeExtractor = new PropertyInfoExtractor([$reflectionExtractor, $phpDocExtractor], [$phpDocExtractor, $reflectionExtractor]);
        self::$serializer = new Serializer(
            normalizers: [
              new ArrayDenormalizer(), new DateTimeNormalizer(),
              new GetSetMethodNormalizer(propertyTypeExtractor: $propertyTypeExtractor, defaultContext: ['skip_null_values' => true]),
              new BackedEnumNormalizer(),
            ],
            encoders: [new JsonEncoder()],
        );
    }

    public static function getSerializer(): Serializer
    {
        return self::$serializer;
    }
}

BaseApiClient::init();

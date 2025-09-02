# HTTP Client Customization Implementation

This document summarizes the implementation of HTTP client customization for the PAYONE Commerce Platform PHP SDK, replicating the functionality from the Java SDK.

## Overview

The implementation allows developers to customize the underlying Guzzle HTTP client used for API requests, providing flexibility for:
- Custom timeouts and connection settings
- Proxy configuration
- Custom headers and authentication
- Request/response middleware
- SSL/TLS configuration
- Retry logic and error handling

## Implementation Details

### 1. CommunicatorConfiguration Changes

**File**: `src/PayoneCommercePlatform/Sdk/CommunicatorConfiguration.php`

**Changes Made**:
- Added `use GuzzleHttp\ClientInterface;` import
- Added `protected ?ClientInterface $httpClient;` property
- Updated constructor to accept optional `?ClientInterface $httpClient` parameter
- Added `getHttpClient(): ?ClientInterface` method
- Added `setHttpClient(?ClientInterface $httpClient): self` method

**Key Features**:
- Global HTTP client configuration
- Backward compatibility (existing code continues to work)
- Fluent interface with method chaining

### 2. BaseApiClient Changes

**File**: `src/PayoneCommercePlatform/Sdk/ApiClient/BaseApiClient.php`

**Changes Made**:
- Added `protected ?ClientInterface $clientSpecificHttpClient;` property
- Updated constructor to store client-specific HTTP client
- Added `getClient(): ClientInterface` method with priority logic
- Added `setHttpClient(?ClientInterface $httpClient): self` method
- Modified constructor to use `getClient()` for HTTP client resolution

**Priority Logic**:
1. **Client-specific HTTP client** (highest priority) - Set via constructor or `setHttpClient()`
2. **Global HTTP client** - Set in `CommunicatorConfiguration`
3. **Default Guzzle client** (lowest priority) - Used when no custom client is configured

### 3. Test Coverage

**File**: `tests/PayoneCommercePlatform/Sdk/CommunicatorConfigurationTest.php`

**Added Tests**:
- `testHttpClientConfiguration()` - Tests global HTTP client configuration
- Constructor parameter testing
- Getter/setter method testing
- Null value handling

**File**: `tests/PayoneCommercePlatform/Sdk/ApiClient/BaseApiClientTest.php`

**Added Tests**:
- `testHttpClientPriorityLogic()` - Tests the priority logic implementation
- Default client behavior
- Global client configuration
- Client-specific overrides
- Setter method functionality

### 4. Documentation

**File**: `README.md`

**Added Section**: "HTTP Client Customization"
- Global HTTP client configuration examples
- Client-specific HTTP client configuration examples
- Priority logic explanation
- Code examples with Guzzle configuration options

**File**: `examples/http-client-customization-example.php`

**Comprehensive Examples**:
- Global HTTP client configuration
- Client-specific HTTP client configuration
- Advanced middleware usage
- Priority logic demonstration

## Usage Examples

### Global Configuration

```php
use GuzzleHttp\Client;
use PayoneCommercePlatform\Sdk\CommunicatorConfiguration;

$customHttpClient = new Client([
    'timeout' => 30,
    'verify' => true,
    'headers' => ['User-Agent' => 'MyApp/1.0']
]);

$config = new CommunicatorConfiguration(
    apiKey: 'your-api-key',
    apiSecret: 'your-api-secret',
    httpClient: $customHttpClient
);
```

### Client-Specific Configuration

```php
use PayoneCommercePlatform\Sdk\ApiClient\CommerceCaseApiClient;

// Via constructor
$clientSpecificClient = new Client(['timeout' => 60]);
$apiClient = new CommerceCaseApiClient($config, $clientSpecificClient);

// Via setter
$apiClient->setHttpClient($clientSpecificClient);
```

## Backward Compatibility

The implementation maintains full backward compatibility:
- Existing code continues to work without changes
- Default behavior remains unchanged
- Optional parameters don't break existing constructors
- All existing tests continue to pass

## Benefits

1. **Flexibility**: Developers can customize HTTP behavior for their specific needs
2. **Performance**: Configure timeouts, connection pooling, and retry logic
3. **Security**: Custom SSL/TLS configuration and proxy support
4. **Debugging**: Add logging and monitoring middleware
5. **Integration**: Easy integration with existing HTTP client configurations

## Comparison with Java Implementation

The PHP implementation follows the same patterns as the Java SDK:
- Global configuration via main configuration class
- Client-specific overrides via constructor/setter
- Same priority logic (client-specific > global > default)
- Similar API design and usage patterns

## Testing

The implementation includes comprehensive tests covering:
- Configuration object behavior
- Priority logic correctness
- Setter/getter functionality
- Backward compatibility
- Edge cases (null values, etc.)

## Future Enhancements

Potential future improvements:
- HTTP client factory pattern
- Configuration validation
- Performance monitoring integration
- Additional middleware examples
- Connection pooling optimization

## Files Modified

1. `src/PayoneCommercePlatform/Sdk/CommunicatorConfiguration.php`
2. `src/PayoneCommercePlatform/Sdk/ApiClient/BaseApiClient.php`
3. `tests/PayoneCommercePlatform/Sdk/CommunicatorConfigurationTest.php`
4. `tests/PayoneCommercePlatform/Sdk/ApiClient/BaseApiClientTest.php`
5. `README.md`

## Files Created

1. `examples/http-client-customization-example.php`
2. `HTTP_CLIENT_CUSTOMIZATION_IMPLEMENTATION.md` (this file)

The implementation successfully replicates the Java SDK's HTTP client customization functionality while following PHP and Guzzle best practices.

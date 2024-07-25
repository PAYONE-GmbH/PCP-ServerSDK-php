<?php

namespace PayoneCommercePlatform\Sdk\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Determines the type of the authorization that will be used. Allowed values:
 * PRE_AUTHORIZATION - The payment creation results in a pre-authorization that is ready for Capture. Pre-
 * authorizations can be reversed and can be captured within 30 days. The capture amount can be lower than the
 * authorized amount.
 * SALE - The payment creation results in an authorization that is already captured at the moment of approval.
 *
 * If the parameter is not provided in the request, the default value will be PRE_AUTHORIZATION.
 */
enum AuthorizationMode: string
{
    case PRE_AUTHORIZATION = 'PRE_AUTHORIZATION';
    case SALE = 'SALE';
}

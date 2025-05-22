<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
 * @description Result of the Address Verification Service checks. Possible values are: 
 * A - Address (Street) matches, Zip does not 
 * B - Street address match for international transactions—Postal code not verified due to incompatible formats 
 * C - Street address and postal code not verified for international transaction due to incompatible formats 
 * D - Street address and postal code match for international transaction, cardholder name is incorrect 
 * E - AVS error 
 * F - Address does match and five digit ZIP code does match (UK only) 
 * G - Address information is unavailable; international transaction; non-AVS participant 
 * H - Billing address and postal code match, cardholder name is incorrect (Amex) 
 * I - Address information not verified for international transaction 
 * K - Cardholder name matches (Amex) 
 * L - Cardholder name and postal code match (Amex) 
 * M - Cardholder name, street address, and postal code match for international transaction 
 * N - No Match on Address (Street) or Zip 
 * O - Cardholder name and address match (Amex) 
 * P - Postal codes match for international transaction—Street address not verified due to incompatible formats 
 * Q - Billing address matches, cardholder is incorrect (Amex) 
 * R - Retry, System unavailable or Timed out 
 * S - Service not supported by issuer 
 * U - Address information is unavailable 
 * W - 9 digit Zip matches, Address (Street) does not 
 * X - Exact AVS Match 
 * Y - Address (Street) and 5 digit Zip match 
 * Z - 5 digit Zip matches, Address (Street) does not 
 * 0 - No service available
 * 
 */
enum AvsResult: string
{
    case A = 'A';
    case B = 'B';
    case C = 'C';
    case D = 'D';
    case E = 'E';
    case F = 'F';
    case G = 'G';
    case H = 'H';
    case I = 'I';
    case K = 'K';
    case L = 'L';
    case M = 'M';
    case N = 'N';
    case O = 'O';
    case P = 'P';
    case Q = 'Q';
    case R = 'R';
    case S = 'S';
    case U = 'U';
    case W = 'W';
    case X = 'X';
    case Y = 'Y';
    case Z = 'Z';
    case ZERO = '0';
}

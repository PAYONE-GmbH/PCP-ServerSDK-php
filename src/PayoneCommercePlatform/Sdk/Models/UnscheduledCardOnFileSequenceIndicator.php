<?php

namespace PayoneCommercePlatform\Sdk\Models;

/**
  * @description
  * - first = This transaction is the first of a series of unscheduled recurring transactions
  * - subsequent = This transaction is a subsequent transaction in a series of unscheduled recurring transactions
  *
  * - Note: this property is not allowed if isRecurring is true.
  */
enum UnscheduledCardOnFileSequenceIndicator: string
{
    case FIRST = 'first';
    case SUBSEQUENT = 'subsequent';
}

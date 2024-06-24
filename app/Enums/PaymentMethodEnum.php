<?php

namespace App\Enums;

enum PaymentMethodEnum: string {
    case WIRETRANSFER = 'wire_transfer';
    case CREDITCARD = 'credit_card';
    case CASH = 'cash';
}

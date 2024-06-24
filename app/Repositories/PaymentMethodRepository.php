<?php

namespace App\Repositories;

use App\Models\PaymentMethod;

class PaymentMethodRepository extends RepositoryBase {
    protected static string $modelClass = PaymentMethod::class;
}

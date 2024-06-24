<?php

namespace Database\Seeders;

use App\Enums\PaymentMethodEnum;
use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [
            [
                'logical_name' => PaymentMethodEnum::WIRETRANSFER->value,
                'name' => 'Wire Transfer',
            ],
            [
                'logical_name' => PaymentMethodEnum::CREDITCARD->value,
                'name' => 'Credit Card',
            ],
        ];

        foreach($methods as $method) {
            PaymentMethod::create($method);
        }
    }
}

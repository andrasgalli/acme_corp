<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\PaymentProcessor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentProcessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $processors = [
            [
                'logical_name' => 'stripe',
                'name' => 'Stripe',
            ],
        ];

        foreach($processors as $processor) {
            PaymentProcessor::create($processor);
        }
    }
}

<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ExternalMissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $goalAmount = rand(100, 1000);
        return [
            'name' => fake()->name(),
            'description' => fake()->sentences(3, true),
            'goal_amount' => $goalAmount,
            'current_amount' => rand(150, $goalAmount-1),
            'deadline' => Carbon::now()->addDays(rand(30, 60)),
            'image_url' => 'https://picsum.photos/id/' . rand(1, 300) . '/300/200',
            'created_by' => fake()->company()
        ];
    }
}

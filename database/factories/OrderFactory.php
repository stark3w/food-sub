<?php

namespace Database\Factories;

use App\Models\Tariff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_name' => $this->faker->name(),
            'client_phone' => $this->faker->unique()->numerify('79#########'),
            'tariff_id' => Tariff::factory(),
            'schedule_type' => $this->faker->randomElement(['EVERY_DAY', 'EVERY_OTHER_DAY', 'EVERY_OTHER_DAY_TWICE']),
            'comment' => $this->faker->sentence(),
            'first_date' => $this->faker->dateTimeBetween('now', '+1 week')->format('Y-m-d'),
            'last_date' => $this->faker->dateTimeBetween('+2 weeks', '+1 month')->format('Y-m-d'),
        ];
    }
}

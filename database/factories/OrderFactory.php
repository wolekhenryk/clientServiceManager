<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $prior = ['high', 'normal', 'low'];
        return [
            'title' => fake()->domainName(),
            'description' => fake()->realText(),
            'priority' => $prior[random_int(0, 2)],
            'due' => fake()->dateTimeBetween(now(), '+4 weeks'),
            'client_id' => Client::factory(),
            'amount' => fake()->randomFloat()
        ];
    }
}

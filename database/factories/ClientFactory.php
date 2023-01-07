<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'surname' => fake()->name(),
            'contact' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'description' => fake()->realText()
        ];
    }

    public function run()
    {
        $client = Client::factory()->has(Order::factory()->count(random_int(2, 7)), 'orders')->create();
    }
}

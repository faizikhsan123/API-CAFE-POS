<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\Outlet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Outlet>
 */
class OutletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Mengambil Business yang sudah dibuat
            'business_id' => Business::inRandomOrder()->value('id'),

            'name' => fake()->company().' Outlet',

            'code' => strtoupper(fake()->unique()->lexify('???')
            ),

            'address' => fake()->address(),

            'phone' => fake()->phoneNumber(),

            'status' => 'active',
        ];
    }
}

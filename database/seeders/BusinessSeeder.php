<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Business::factory()
            ->state([
                'name' => 'Cafe ABC',
                'slug' => 'cafe-abc',
            ])
            ->create();

        Business::factory()
            ->state([
                'name' => 'Warkop Angkringan',
                'slug' => 'warkop-angkringan',
            ])
            ->create();

        Business::factory()
            ->state([
                'name' => 'Angkringan 99',
                'slug' => 'angkringan-99',
            ])
            ->create();
    }
}

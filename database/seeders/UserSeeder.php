<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil Business Cafe ABC
        $business = Business::where('slug', 'cafe-abc')->firstOrFail();

        // Ambil satu outlet dari Cafe ABC
        $outlet = $business->outlets()->firstOrFail();

        // =========================
        // OWNER
        // =========================

        $owner = User::factory()
            ->state([
                'name' => 'Owner Cafe ABC',
                'email' => 'owner@cafeabc.test',
            ])
            ->create();

        // Assign role
        $owner->assignRole('owner');

        // Owner terhubung ke Business cafe abc
        // ini untuk tabble bisnis_user
        $owner->businesses()->attach($business->id);

        // =========================
        // MANAGER
        // =========================

        $manager = User::factory()
            ->state([
                'name' => 'Manager Cafe ABC',
                'email' => 'manager@cafeabc.test',
            ])
            ->create();

        // Assign role
        $owner->assignRole('manager');

        // Manager terhubung ke Business cafe abc
        // ini untuk tabble ke bisnis_user juga
        $manager->businesses()->attach($business->id);

        // Manager hanya memiliki satu Outlet
        // sedangkaan ini unutk outlet user
        $manager->outlets()->attach($outlet->id);

        // =========================
        // CASHIER
        // =========================

        $cashier = User::factory()
            ->state([
                'name' => 'Cashier Cafe ABC',
                'email' => 'cashier@cafeabc.test',
            ])
            ->create();

        // Assign role cashier
        $cashier->assignRole('cashier');

        // Cashier terhubung ke Business cafe abc
        $cashier->businesses()->attach($business->id);

        // Cashier hanya memiliki satu Outlet
        $cashier->outlets()->attach($outlet->id);
    }
}

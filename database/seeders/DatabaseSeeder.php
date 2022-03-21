<?php

namespace Database\Seeders;

use App\Models\GroceryList;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $me = User::factory()->create([
            'name' => 'Casper Panduro',
            'email' => 'cap@checkmate.dk',
            'email_verified_at' => now(),
            'password' => Hash::make('Casp3r1337!')
        ]);

        GroceryList::factory(2)->create([
            'user_id' => $me
        ]);
        // \App\Models\User::factory(10)->create();
    }
}

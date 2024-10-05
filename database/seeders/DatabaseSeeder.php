<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Hazem',
            'email' => 'hazem.ismail@hotmail.com',
            'role' => 'admin',
            'password' => 'H@zem99589018',
        ]);

        User::create([
            'name' => 'Norhan',
            'email' => 'nourhan@alprimecap.com',
            'role' => 'accountant',
            'password' => '123123123',
        ]);

        $this->call([
            ItemSeeder::class,
        ]);
    }
}

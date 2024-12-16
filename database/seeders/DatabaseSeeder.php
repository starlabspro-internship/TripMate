<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => "admin@gmail.com"],
            [
                'name' => 'admin',
                'password' => Hash::make('tripmate8'),
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
            ]
        );
        User::firstOrCreate(
           ['email' => 'superadmin@gmail.com'],

           [
              'name' => 'superadmin' ,
               'password' => Hash::make('tripmate8'),
               'is_super_admin' => true,
               'email_verified_at' => now(),
               ]
           );
        $this->call(CitySeeder::class);
    }
}

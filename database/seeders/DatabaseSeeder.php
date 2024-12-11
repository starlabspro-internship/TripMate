<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => "admin@gmail.com"],
            [
                'name' => 'admin',
                'password' => Hash::make('adminpassword'),
                'email' => 'admin@gmail.com',
            ]
        );
        User::firstOrCreate(
           ['email' => 'superadmin@gmail.com'],
           
           [
              'name' => 'superadmin' ,
               'password' => Hash::make('superadmin'),
               'is_super_admin' => true,
               ]
           );
        $this->call(CitySeeder::class);
    }
}

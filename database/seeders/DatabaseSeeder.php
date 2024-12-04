<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('adminpassword'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'superadmin@gmail.com'],
            [
                'name' => 'superadmin',
                'password' => Hash::make('superadmin'),
                'is_super_admin' => true,
            ]
        );
        $this->call(CitySeeder::class);
    }
}

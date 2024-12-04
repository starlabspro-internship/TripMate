public function run(): void
{
    User::factory()->firstOrCreate(
        ['email' => 'admin@gmail.com'],
        [
            'name' => 'admin',
            'password' => Hash::make('adminpassword'),
        ]
    );

    User::factory()->firstOrCreate(
        ['email' => 'superadmin@gmail.com'],
        [
            'name' => 'superadmin',
            'password' => Hash::make('superadmin'),
            'is_super_admin' => true,
        ]
    );

    $this->call(CitySeeder::class);
}

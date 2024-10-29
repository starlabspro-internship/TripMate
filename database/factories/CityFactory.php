<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => (['Vushtrria',
                        'Viti',
                        'Therandë',
                        'Skenderaj',
                        'Shtime',
                        'Shtërpca',
                        'Rahoveci',
                        'Prizreni',
                        'Prishtina',
                        'Podujeva',
                        'Peja',
                        'Obiliq',
                        'Mitrovica',
                        'Malisheva',
                        'Lipjan',
                        'Klinë',
                        'Kamenicë',
                        'Kaçaniku',
                        'Istog',
                        'Gjilan',
                        'Gjakova',
                        'Fushë Kosova',
                        'Ferizaj',
                        'Drenas',
                        'Dragash',
                        'Deçan'])
        ];
    }
}

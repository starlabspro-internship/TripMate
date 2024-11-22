<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Vushtrria', 'Viti', 'Therandë', 'Skenderaj', 'Shtime',
            'Shtërpca', 'Rahoveci', 'Prizreni', 'Prishtina', 'Podujeva',
            'Peja', 'Obiliq', 'Mitrovica', 'Malisheva', 'Lipjan', 'Klinë',
            'Kamenicë', 'Kaçaniku', 'Istog', 'Gjilan', 'Gjakova',
            'Fushë Kosova', 'Ferizaj', 'Drenas', 'Dragash', 'Deçan'
        ];
        $latitudes = [
            42.82706089, 42.32308299, 42.36263650, 42.74803998, 42.43312339,
            42.24076604, 42.39975067, 42.21781818, 42.66473177, 42.91092850,
            42.66036634, 42.68751998, 42.89303142, 42.48432463, 42.52595188, 42.61939454,
            42.58873698, 42.22797016, 42.78208777, 42.46496672, 42.38474409,
            42.63835376, 42.37064862, 42.62150252, 42.06155539, 42.54087042,
        ];
        $longitudes = [
            20.97086772, 21.35917130, 20.83170623, 20.78980005, 21.03967963,
            21.02564965, 20.65468310, 20.74008999, 21.15906976, 21.19633293,
            20.28911993, 21.06681603, 20.86485607, 20.74373514, 21.12246967, 20.578010269,
            21.57356952, 21.25772275, 20.49145490, 21.47010585, 20.42808807,
            21.09236975, 21.14744665, 20.89143588, 20.65104092, 20.28843158,
        ];


        if (count($cities) === count($latitudes) && count($cities) === count($longitudes)) {
            foreach ($cities as $index => $city) {
                DB::table('cities')->insert([
                    'name' => $city,
                    'latitude' => $latitudes[$index],
                    'longitude' => $longitudes[$index],
                ]);
            }
        }
    }
}

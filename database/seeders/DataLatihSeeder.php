<?php

namespace Database\Seeders;

use App\Enums\JenisKerusakan;
use App\Models\DataLatih;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataLatihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maxDataPerClass = 60;
        $minDataPerClass = 70;

        // RINGAN
        $count = DataLatih::where('class', JenisKerusakan::RINGAN->value)->count();
        $total = rand($minDataPerClass, $maxDataPerClass);

        while ($count <= $total) {
            $data = DataLatih::factory()->make();
            if ($data->class == JenisKerusakan::RINGAN->value) {
                $data->save();
                $count++;
            }
        }

        // SEDANG
        $count = DataLatih::where('class', JenisKerusakan::SEDANG->value)->count();
        $total = rand($minDataPerClass, $maxDataPerClass);

        while ($count <= $total) {
            $data = DataLatih::factory()->make();
            if ($data->class == JenisKerusakan::SEDANG->value) {
                $data->save();
                $count++;
            }
        }

        // BERAT
        $count = DataLatih::where('class', JenisKerusakan::BERAT->value)->count();
        $total = rand($minDataPerClass, $maxDataPerClass);

        while ($count <= $total) {
            $data = DataLatih::factory()->make();
            if ($data->class == JenisKerusakan::BERAT->value) {
                $data->save();
                $count++;
            }
        }

        // BERAT_SEKALI
        $count = DataLatih::where('class', JenisKerusakan::BERAT_SEKALI->value)->count();
        $total = rand($minDataPerClass, $maxDataPerClass);

        while ($count <= $total) {
            $data = DataLatih::factory()->make();
            if ($data->class == JenisKerusakan::BERAT_SEKALI->value) {
                $data->save();
                $count++;
            }
        }
    }
}

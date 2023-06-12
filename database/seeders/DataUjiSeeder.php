<?php

namespace Database\Seeders;

use App\Enums\JenisKerusakan;
use App\Models\DataUji;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataUjiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maxDataPerClass = 10;
        $minDataPerClass = 10;

        // RINGAN
        $count = DataUji::where('class', JenisKerusakan::RINGAN->value)->count();
        $total = rand($minDataPerClass, $maxDataPerClass);

        while ($count <= $total) {
            $data = DataUji::factory()->make();
            if ($data->class == JenisKerusakan::RINGAN->value) {
                $data->save();
                $count++;
            }
        }

        // SEDANG
        $count = DataUji::where('class', JenisKerusakan::SEDANG->value)->count();
        $total = rand($minDataPerClass, $maxDataPerClass);

        while ($count <= $total) {
            $data = DataUji::factory()->make();
            if ($data->class == JenisKerusakan::SEDANG->value) {
                $data->save();
                $count++;
            }
        }

        // BERAT
        $count = DataUji::where('class', JenisKerusakan::BERAT->value)->count();
        $total = rand($minDataPerClass, $maxDataPerClass);

        while ($count <= $total) {
            $data = DataUji::factory()->make();
            if ($data->class == JenisKerusakan::BERAT->value) {
                $data->save();
                $count++;
            }
        }

        // BERAT_SEKALI
        $count = DataUji::where('class', JenisKerusakan::BERAT_SEKALI->value)->count();
        $total = rand($minDataPerClass, $maxDataPerClass);

        while ($count <= $total) {
            $data = DataUji::factory()->make();
            if ($data->class == JenisKerusakan::BERAT_SEKALI->value) {
                $data->save();
                $count++;
            }
        }
    }
}

<?php

namespace Database\Factories;

use App\Enums\JenisKerusakan;
use App\Enums\Kerusakan;
use App\Models\DataLatih;
use App\Utilities\Data;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataLatih>
 */
class DataLatihFactory extends Factory
{
    protected $model = DataLatih::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countAttr = rand(2, 15);
        $count = collect([]);
        foreach (Kerusakan::all() as $attr) {
            $count->put($attr, 0);
        }

        $latih = collect([]);

        $currCountAttr = 0;
        foreach (Data::attributes() as $attr) {
            $fill = abs(1 - mt_rand() / mt_rand());

            if ($fill > 0.5 && $currCountAttr <= $countAttr) {
                $kerusakan =  $this->faker->randomElement(Kerusakan::all());
                $latih->put($attr, $kerusakan);
                $currCountAttr++;
                $count[$kerusakan] += 1;
            } else {
                $latih->put($attr, Kerusakan::NIL->value);
            }
        }

        $totalRusakParah = $count[Kerusakan::PENYOK_PARAH->value] + $count[Kerusakan::ROBEK_PARAH->value];

        $latih->put('no_polisi',  Str::of($this->faker->bothify('DN####??'))->upper());

        if ($totalRusakParah >= 2 && $totalRusakParah < 5) {
            $latih->put('class',  JenisKerusakan::SEDANG->value);
        } else if ($totalRusakParah >= 5 && $totalRusakParah < 8) {
            $latih->put('class',  JenisKerusakan::BERAT->value);
        } else if ($totalRusakParah >= 8) {
            $latih->put('class',  JenisKerusakan::BERAT_SEKALI->value);
        } else {
            $latih->put('class',  JenisKerusakan::RINGAN->value);
        }

        // 'no_polisi' => $this->faker->bothify('Dn####??'),
        // 'class' => $this->faker->randomElement(JenisKerusakan::allWithoutNone()),

        return $latih->toArray();
    }
}

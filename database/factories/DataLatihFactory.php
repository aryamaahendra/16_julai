<?php

namespace Database\Factories;

use App\Enums\JenisKerusakan;
use App\Enums\Kerusakan;
use App\Models\DataLatih;
use App\Utilities\Data;
use Illuminate\Database\Eloquent\Factories\Factory;

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
      $latih = collect([
         'no_polisi' => $this->faker->bothify('Dn####??'),
         'class' => $this->faker->randomElement(JenisKerusakan::allWithoutNone()),
      ]);

      foreach (Data::attributes() as $attr) {
         $latih->put($attr, $this->faker->randomElement(Kerusakan::all()));
      }

      return $latih->toArray();
   }
}

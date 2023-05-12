<?php

namespace App\Actions;

use App\Enums\Kerusakan;
use App\Models\DataLatih;
use App\Models\DataUji;
use App\Utilities\Data;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class KNN
{
   public function __invoke(array $input): array
   {
      $allLatih = DataLatih::all();
      $result = collect([]);

      foreach ($allLatih as $latih) {
         $result->push([
            'class' => $latih->class,
            'euclidean' => $this->euclidean($latih, $input)
         ]);
      }

      $result = $result->take((int) $input['k']);
      $allKerusakan = collect([]);

      foreach ($result as $item) {
         if ($allKerusakan->has($item['class'])) {
            $allKerusakan[$item['class']] += 1;
         } else {
            $allKerusakan->put($item['class'], 1);
         }
      }
      $allKerusakan = $allKerusakan->sortDesc();

      $first = $allKerusakan->values()->all()[0];
      $second = $allKerusakan->values()->all()[1] ?? null;
      $kerusakan = null;

      if ($first != $second) {
         foreach ($allKerusakan as $key => $value) {
            $kerusakan = [
               'class' => $key,
               'total' => $value,
            ];
            break;
         }
      }

      return [
         'allResult' => $result,
         'kerusakan' => $kerusakan
      ];
   }

   protected function euclidean($model, $data)
   {
      $sum = 0;

      foreach (Data::attributes() as $attr) {
         $attr1 = Kerusakan::toInt($model[$attr]);
         $attr2 = Kerusakan::toInt($data[$attr]);

         $sum += pow($attr1 - $attr2, 2);
      }

      return sqrt($sum);
   }
}

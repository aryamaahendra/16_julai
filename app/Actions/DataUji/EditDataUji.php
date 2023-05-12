<?php

namespace App\Actions\DataUji;

use App\Models\DataUji;
use App\Utilities\Data;
use Illuminate\Support\Str;

class EditDataUji
{
   public function __invoke(DataUji $uji, array $input): DataUji
   {
      $uji->no_polisi = $input['no_polisi'];
      $uji->class = $input['class'];

      foreach (Data::attributes() as $attr) {
         $uji[$attr] = Str::of($input[$attr])->toString();
      }

      $uji->save();

      return $uji;
   }
}

<?php

namespace App\Actions\DataLatih;

use App\Models\DataLatih;
use App\Utilities\Data;
use Illuminate\Support\Str;

class EditDataLatih
{
   public function __invoke(DataLatih $latih, array $input): DataLatih
   {
      $latih->no_polisi = $input['no_polisi'];
      $latih->class = $input['class'];

      foreach (Data::attributes() as $attr) {
         $latih[$attr] = Str::of($input[$attr])->toString();
      }

      $latih->save();

      return $latih;
   }
}

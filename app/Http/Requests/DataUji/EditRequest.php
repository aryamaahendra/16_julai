<?php

namespace App\Http\Requests\DataUji;

use App\Actions\DataUji\EditDataUji as Action;
use App\Models\DataUji;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class EditRequest extends CreateRequest
{
   public function fulfill(): DataUji
   {
      try {
         DB::beginTransaction();

         $uji = $this->route('data_uji');
         $action = new Action();
         $uji = $action($uji, $this->validated());

         DB::commit();

         return $uji;
      } catch (\Throwable $th) {
         throw $th;
      }
   }
}

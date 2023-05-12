<?php

namespace App\Http\Requests\DataLatih;

use App\Actions\DataLatih\EditDataLatih as Action;
use App\Models\DataLatih;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class EditRequest extends CreateRequest
{
   public function fulfill(): DataLatih
   {
      try {
         DB::beginTransaction();

         $latih = $this->route('data_latih');
         $action = new Action();
         $latih = $action($latih, $this->validated());

         DB::commit();

         return $latih;
      } catch (\Throwable $th) {
         throw $th;
      }
   }
}

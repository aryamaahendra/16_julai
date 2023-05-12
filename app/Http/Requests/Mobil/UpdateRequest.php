<?php

namespace App\Http\Requests\Mobil;

use App\Actions\KNN;
use App\Models\Mobil;
use App\Actions\Mobil\UpdateMobil as Action;
use App\Utilities\Data;
use Illuminate\Support\Facades\DB;

class UpdateRequest extends CreateRequest
{
   public function fulfill(): Mobil
   {
      try {
         DB::beginTransaction();

         $kerusakan = $this->only(Data::attributes());
         $kerusakan['k'] = 7;

         $knn = new KNN();
         $hasilKNN = $knn($kerusakan);

         $mobil = $this->route('mobil');

         $action = new Action();
         $mobil = $action($mobil, $this->validated(), $hasilKNN['kerusakan']['class']);

         DB::commit();

         return $mobil;
      } catch (\Throwable $th) {
         DB::rollBack();
         throw $th;
         abort(500, 'Gagal menyimpan data mobil masuk.');
      }
   }
}

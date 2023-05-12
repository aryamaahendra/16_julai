<?php

namespace App\Actions\Mobil;

use App\Models\KerusakanMobil;
use App\Models\Mobil;
use App\Utilities\Data;
use Illuminate\Support\Str;

class UpdateMobil
{
   public function __invoke(Mobil $mobil, array $input, string $jenis_kerusakan): Mobil
   {
      $mobil->nama_pemilik = $input['nama_pemilik'];
      $mobil->no_polisi = $input['no_polisi'];
      $mobil->alamat = $input['alamat'];
      $mobil->masuk_at = $input['tanggal_masuk'];
      $mobil->jenis_kerusakan = $jenis_kerusakan;
      $mobil->save();

      $kerusakan = $mobil->kerusakan;
      $kerusakan->mobil_id = $mobil->id;
      $kerusakan->class = $jenis_kerusakan;

      foreach (Data::attributes() as $attr) {
         $kerusakan[$attr] = Str::of($input[$attr])->toString();
      }
      $kerusakan->save();


      return $mobil;
   }
}

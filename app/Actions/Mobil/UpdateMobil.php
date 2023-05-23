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
        $mobil->jenis_mobil = $input['jenis_mobil'];
        $mobil->nama_asuransi = $input['nama_asuransi'];
        $mobil->alamat = $input['alamat'];
        $mobil->masuk_at = $input['tanggal_masuk'];
        $mobil->nama_teknisi = $input['nama_teknisi'];
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

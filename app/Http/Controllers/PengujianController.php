<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengujianRequest;
use App\Models\Pengujian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengujianController extends Controller
{
   public function index(): View
   {
      $pengujian = Pengujian::latest()->first();
      $cn = json_decode($pengujian?->data, true);

      return view('pengujian.index', [
         'pengujian' => $pengujian,
         'cn' => $cn
      ]);
   }

   public function proces(PengujianRequest $request): RedirectResponse
   {
      $request->fulfill();

      return redirect()->route('pengujian.index')->with([
         'alert' => [
            'error' => false,
            'message' => 'Berhasil melakukan pengujian!'
         ]
      ]);
   }
}

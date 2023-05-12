<?php

namespace App\Http\Controllers;

use App\Http\Requests\Klasifikasi\ProcesRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KlasifikasiController extends Controller
{
   public function index(): View
   {
      return view('Klasifikasi.index');
   }

   public function proces(ProcesRequest $request): View
   {
      $result = $request->fulfill();

      return view('Klasifikasi.proces', $result);
   }
}

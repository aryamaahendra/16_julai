<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataUji\CreateRequest;
use App\Http\Requests\DataUji\EditRequest;
use App\Models\DataUji;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DataUjiController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index(): View
   {
      $allData = DataUji::all();

      return view('data-uji.index', [
         'allData' => $allData
      ]);
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create(): View
   {
      return view('data-uji.create');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(CreateRequest $request): RedirectResponse
   {
      $uji = $request->fulfill();

      if (empty($uji)) abort(500, 'Something broken!');

      return redirect()->route('data-uji.index')->with([
         'alert' => [
            'error' => false,
            'message' => 'Data Uji barhasil ditambahkan!'
         ]
      ]);
   }

   /**
    * Display the specified resource.
    */
   // public function show(string $id)
   // {
   //    //
   // }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Request $request): View
   {
      $uji = $request->route('data_uji');
      return view('data-uji.edit', [
         'uji' => $uji
      ]);
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(EditRequest $request)
   {
      $uji = $request->fulfill();

      if (empty($uji)) abort(500, 'Something broken!');

      return redirect()->route('data-uji.index')->with([
         'alert' => [
            'error' => false,
            'message' => 'Data Uji barhasil diupdate!'
         ]
      ]);
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Request $request): RedirectResponse
   {
      try {
         DB::beginTransaction();
         $uji = $request->route('data_uji');
         $uji->delete();
         DB::commit();

         return redirect()->route('data-uji.index')->with([
            'alert' => [
               'error' => false,
               'message' => 'Data Uji barhasil dihapus!'
            ]
         ]);
      } catch (\Throwable $th) {
         throw $th;
      }
   }
}

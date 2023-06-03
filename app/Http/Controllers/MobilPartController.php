<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mobil\Part\CreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobilPartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $request->fulfill();

        return  response()->json([
            'error' => false,
            'message' => "Data berhasil ditambah.",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $part = $request->route('part');
        $mobil = $request->route('mobil');

        DB::transaction(fn () => $part->delete());

        return redirect()->route('mobil.show', [
            'mobil' => $mobil->id,
            'page' => 'suku-cadang'
        ])->with([
            'alert' => [
                'error' => false,
                'message' => "Data berhasil dihapus.",
            ]
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mobil\CreateRequest;
use App\Http\Requests\Mobil\UpdateRequest;
use App\Models\Mobil;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $allMobil = Mobil::all();

        return view('mobil.index', [
            'allMobil' => $allMobil
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $mobil = $request->fulfill();

        if (empty($mobil)) abort(500, 'Something broken!');

        return redirect()->route('mobil.index')->with([
            'alert' => [
                'error' => false,
                'message' => 'Data mobil barhasil ditambahkan!'
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request): View
    {
        $mobil = $request->route('mobil');

        return view('mobil.show', [
            'mobil' => $mobil
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request): View
    {
        $mobil = $request->route('mobil');

        return view('mobil.edit', [
            'mobil' => $mobil
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request): RedirectResponse
    {
        $mobil = $request->fulfill();

        if (empty($mobil)) abort(500, 'Something broken!');

        return redirect()->route('mobil.index')->with([
            'alert' => [
                'error' => false,
                'message' => 'Data mobil barhasil diupdate!'
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
            $mobil = $request->route('mobil');
            $mobil->kerusakan->delete();
            $mobil->delete();
            DB::commit();

            return redirect()->route('mobil.index')->with([
                'alert' => [
                    'error' => false,
                    'message' => 'Data mobil barhasil dihapus!'
                ]
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

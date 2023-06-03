<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataLatih\CreateRequest;
use App\Http\Requests\DataLatih\EditRequest;
use App\Models\DataLatih;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DataLatihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $allData = DataLatih::all();

        return view('data-latih.index', [
            'allData' => $allData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-latih.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $latih = $request->fulfill();

        if (empty($latih)) abort(500, 'Something broken!');

        return redirect()->route('data-latih.index')->with([
            'alert' => [
                'error' => false,
                'message' => 'Data latih barhasil ditambahkan!'
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
        $latih = $request->route('data_latih');
        return view('data-latih.edit', [
            'latih' => $latih
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request)
    {
        $latih = $request->fulfill();

        if (empty($latih)) abort(500, 'Something broken!');

        return redirect()->route('data-latih.index')->with([
            'alert' => [
                'error' => false,
                'message' => 'Data latih barhasil diupdate!'
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
            $latih = $request->route('data_latih');
            $latih->delete();
            DB::commit();

            return redirect()->route('data-latih.index')->with([
                'alert' => [
                    'error' => false,
                    'message' => 'Data latih barhasil dihapus!'
                ]
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

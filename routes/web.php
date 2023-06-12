<?php

use App\Http\Controllers\DataLatihController;
use App\Http\Controllers\DataUjiController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MobilJasaController;
use App\Http\Controllers\MobilPartController;
use App\Http\Controllers\PengujianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\ResolveWebParams;
use App\Models\DataLatih;
use App\Models\DataUji;
use App\Models\Mobil;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $data = collect([
        'latih' => DataLatih::count(),
        'uji' => DataUji::count(),
        'mobil' => Mobil::count(),
    ]);

    return view('dashboard', ['data' => $data]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', ResolveWebParams::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('data-latih', DataLatihController::class)->except(['show']);
    Route::resource('data-uji', DataUjiController::class)->except(['show']);

    Route::resource('mobil/{mobil}/jasa', MobilJasaController::class)->names('mobil.jasa');
    Route::resource('mobil/{mobil}/part', MobilPartController::class)->names('mobil.part');
    Route::get('mobil/{mobil}/print', [MobilController::class, 'print'])->name('mobil.print');
    Route::resource('mobil', MobilController::class);

    Route::get('klasifikasi', [KlasifikasiController::class, 'index'])->name('klasifikasi.index');
    Route::post('klasifikasi', [KlasifikasiController::class, 'proces'])->name('klasifikasi.proces');

    Route::get('pengujian', [PengujianController::class, 'index'])->name('pengujian.index');
    Route::post('pengujian', [PengujianController::class, 'proces'])->name('pengujian.proces');
});

Route::get('test', [TestController::class, 'index']);

require __DIR__ . '/auth.php';

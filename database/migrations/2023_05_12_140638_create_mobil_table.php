<?php

use App\Enums\JenisKerusakan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      Schema::create('mobil', function (Blueprint $table) {
         $table->id();

         $table->string('no_polisi', 20);
         $table->string('nama_pemilik', 56);
         $table->string('alamat', 255);
         $table->date('masuk_at');
         $table->enum('jenis_kerusakan', JenisKerusakan::all());

         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('mobil');
   }
};

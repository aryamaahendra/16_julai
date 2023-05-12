<?php

use App\Enums\JenisKerusakan;
use App\Enums\Kerusakan;
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
      Schema::create('kerusakan_mobil', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('mobil_id');
         $table->foreign('mobil_id')->references('id')->on('mobil');

         $table->enum('class', JenisKerusakan::all());

         $table->enum('bumper_rr', Kerusakan::all());
         $table->enum('bumper_fr', Kerusakan::all());
         $table->enum('spoiler_bumper_rr', Kerusakan::all());
         $table->enum('spoiler_bumper_fr', Kerusakan::all());
         $table->enum('headlamp_lh', Kerusakan::all());
         $table->enum('headlamp_rh', Kerusakan::all());
         $table->enum('fender_lh', Kerusakan::all());
         $table->enum('fender_rh', Kerusakan::all());
         $table->enum('kap_mesin', Kerusakan::all());
         $table->enum('support_radiator', Kerusakan::all());
         $table->enum('spion_lh', Kerusakan::all());
         $table->enum('spion_rh', Kerusakan::all());
         $table->enum('pintu_fr_lh', Kerusakan::all());
         $table->enum('pintu_fr_rh', Kerusakan::all());
         $table->enum('pintu_rr_lh', Kerusakan::all());
         $table->enum('pintu_rr_rh', Kerusakan::all());
         $table->enum('kaca_pintu', Kerusakan::all());
         $table->enum('tiang_pintu_rr', Kerusakan::all());
         $table->enum('tiang_pintu_fr', Kerusakan::all());
         $table->enum('quarter_lh', Kerusakan::all());
         $table->enum('quarter_rh', Kerusakan::all());
         $table->enum('triplang_rh', Kerusakan::all());
         $table->enum('triplang_lh', Kerusakan::all());
         $table->enum('cover_triplang_rh', Kerusakan::all());
         $table->enum('cover_triplang_lh', Kerusakan::all());
         $table->enum('pintu_bagasi', Kerusakan::all());
         $table->enum('lantai', Kerusakan::all());
         $table->enum('stop_lamp_lh', Kerusakan::all());
         $table->enum('stop_lamp_rh', Kerusakan::all());
         $table->enum('kaca_fr', Kerusakan::all());
         $table->enum('kaca_rr', Kerusakan::all());
         $table->enum('pipih_lh', Kerusakan::all());
         $table->enum('pipih_rh', Kerusakan::all());
         $table->enum('pilar_lh', Kerusakan::all());
         $table->enum('pilar_rh', Kerusakan::all());
         $table->enum('cover_ban_serep', Kerusakan::all());
         $table->enum('roof', Kerusakan::all());
         $table->enum('air_bag', Kerusakan::all());
         $table->enum('mesin', Kerusakan::all());

         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::table('kerusakan_mobil', function (Blueprint $table) {
         $table->dropForeign(['mobil_id']);
      });
      Schema::dropIfExists('kerusakan_mobil');
   }
};

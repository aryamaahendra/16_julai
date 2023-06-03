<?php

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
        Schema::create('mobil_jasa', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('mobil_id');
            $table->foreign('mobil_id')->references('id')->on('mobil');

            $table->string('nama', 128);
            $table->string('status', 64);
            $table->unsignedInteger('harga')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mobil_jasa', function (Blueprint $table) {
            $table->dropForeign(['mobil_id']);
        });

        Schema::dropIfExists('mobil_jasa');
    }
};

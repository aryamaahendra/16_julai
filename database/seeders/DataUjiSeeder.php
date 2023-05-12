<?php

namespace Database\Seeders;

use App\Models\DataUji;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataUjiSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      DataUji::factory(20)->create();
   }
}

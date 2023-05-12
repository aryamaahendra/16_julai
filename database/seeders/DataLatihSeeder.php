<?php

namespace Database\Seeders;

use App\Models\DataLatih;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataLatihSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      DataLatih::factory(100)->create();
   }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
   use HasFactory;

   protected $table = 'mobil';

   public function kerusakan()
   {
      return $this->hasOne(KerusakanMobil::class, 'mobil_id');
   }
}

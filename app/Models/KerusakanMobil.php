<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerusakanMobil extends Model
{
   use HasFactory;

   protected $table = 'kerusakan_mobil';

   public function mobil()
   {
      return $this->belongsTo(Mobil::class, 'mobil_id');
   }
}

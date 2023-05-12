<?php

namespace App\Models;

use Database\Factories\DataLatihFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLatih extends Model
{
   use HasFactory;

   protected static function newFactory(): Factory
   {
      return DataLatihFactory::new();
   }

   protected $table = 'data_latih';
}

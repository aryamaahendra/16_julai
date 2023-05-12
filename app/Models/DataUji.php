<?php

namespace App\Models;

use Database\Factories\DataUjiFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUji extends Model
{
   use HasFactory;

   protected static function newFactory(): Factory
   {
      return DataUjiFactory::new();
   }

   protected $table = 'data_uji';
}

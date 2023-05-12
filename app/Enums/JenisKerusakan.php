<?php

namespace App\Enums;

enum JenisKerusakan: string
{
   case RINGAN = "ringan";
   case SEDANG = "sedang";
   case BERAT = "berat";
   case BERAT_SEKALI = "berat sekali";

   public static function all(): array
   {
      return array_column(JenisKerusakan::cases(), 'value');
   }
}

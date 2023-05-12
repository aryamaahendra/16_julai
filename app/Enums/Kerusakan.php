<?php

namespace App\Enums;

enum Kerusakan: string
{
   case NIL = "none";
   case BARET = "baret";
   case RETAK = "retak";
   case PENYOK = "penyok";
   case PENYOK_PARAH = "penyok parah";
   case ROBEK = "robek";
   case ROBEK_PARAH = "robek parah";

   public static function all(): array
   {
      return array_column(Kerusakan::cases(), 'value');
   }

   public static function toInt(string $val)
   {
      switch ($val) {
         case self::NIL->value:
            return 0;
            break;
         case self::BARET->value:
            return 1;
            break;
         case self::RETAK->value:
            return 2;
            break;
         case self::PENYOK->value:
            return 3;
            break;
         case self::PENYOK_PARAH->value:
            return 4;
            break;
         case self::ROBEK->value:
            return 5;
            break;
         case self::ROBEK_PARAH->value:
            return 6;
            break;
         default:
            return 0;
            break;
      }
   }
}

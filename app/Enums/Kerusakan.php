<?php

namespace App\Enums;

use App\Utilities\Data;

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

    public static function AKESORIS(): array
    {
        return [
            self::NIL->value,
            self::BARET->value,
            self::RETAK->value,
        ];
    }

    public static function AIRBAG(): array
    {
        return [
            self::NIL->value,
            self::ROBEK_PARAH->value
        ];
    }

    public static function MESIN(): array
    {
        return [
            self::NIL->value,
            self::RETAK->value,
            self::PENYOK_PARAH->value,
        ];
    }

    public static function BODY(): array
    {
        return [
            self::NIL->value,
            self::BARET->value,
            self::PENYOK->value,
            self::PENYOK_PARAH->value,
        ];
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
                return 3;
                break;
            case self::ROBEK_PARAH->value:
                return 4;
                break;
            default:
                return 0;
                break;
        }
    }
}

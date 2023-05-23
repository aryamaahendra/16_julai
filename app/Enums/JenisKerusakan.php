<?php

namespace App\Enums;

enum JenisKerusakan: string
{
    case NONE = 'tidak dikenali';
    case RINGAN = 'ringan';
    case SEDANG = 'sedang';
    case BERAT = 'berat';
    case BERAT_SEKALI = 'berat sekali';

    public static function all(): array
    {
        return array_column(JenisKerusakan::cases(), 'value');
    }

    public static function allWithoutNone(): array
    {
        return [
            self::RINGAN->value,
            self::SEDANG->value,
            self::BERAT->value,
            self::BERAT_SEKALI->value,
        ];
    }
}

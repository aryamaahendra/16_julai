<?php

namespace App\Actions;

use App\Enums\JenisKerusakan;
use App\Enums\Kerusakan;
use App\Models\DataLatih;
use App\Models\DataUji;
use App\Models\Pengujian;
use App\Utilities\Data;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ConfusionMatrix
{
    public function __invoke(array $input): Pengujian
    {
        $allUji = DataUji::all();
        $cn = collect([]);

        foreach (JenisKerusakan::allWithoutNone() as $actual) {
            $temp = collect([]);
            foreach (JenisKerusakan::allWithoutNone() as $predicted) {
                $temp->put(Str::replace(' ', '_', $predicted), 0);
            }
            $cn->put(Str::replace(' ', '_', $actual), $temp);
        }
        unset($temp);

        foreach ($allUji as $uji) {
            $knn = new KNN();
            $data = Arr::except(
                $uji->getAttributes(),
                ['id', 'class', 'no_polisi', 'created_at', 'updated_at']
            );
            $data =  Arr::add($data, 'k', $input['k']);

            $result = $knn($data);

            if (empty($result['kerusakan'])) {
            } else {
                $actual = Str::replace(' ', '_', $uji->class);
                $predicted = Str::replace(' ', '_', $result['kerusakan']['class']);
                $cn[$actual][$predicted] += 1;
            }
        }

        $pengujian = new Pengujian();
        $pengujian->data = json_encode($cn->toArray());
        $pengujian->save();

        return $pengujian;
    }
}

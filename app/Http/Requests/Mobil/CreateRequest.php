<?php

namespace App\Http\Requests\Mobil;

use App\Actions\Mobil\CreateMobil as Action;
use App\Actions\KNN;
use App\Enums\JenisKerusakan;
use App\Enums\Kerusakan;
use App\Models\Mobil;
use App\Utilities\Data;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = collect([
            'nama_pemilik' => 'required|string|max:56',
            'no_polisi' => 'required|string|max:20',
            'jenis_mobil' => 'required|string|max:128',
            'nama_asuransi' => 'required|string|max:128',
            'alamat' => 'required|string|max:200',
            'tanggal_masuk' => 'required|date',
            'nama_teknisi' => 'required|string|max:56',
        ]);

        foreach (Data::attributes() as $attr) {
            $rules->put($attr, ['required', 'string', Rule::in(Kerusakan::all())]);
        }

        return $rules->toArray();
    }

    public function fulfill(): Mobil
    {
        try {
            DB::beginTransaction();

            $kerusakan = $this->only(Data::attributes());
            $kerusakan['k'] = 7;

            $knn = new KNN();
            $hasilKNN = $knn($kerusakan);

            $action = new Action();
            $mobil = $action(
                $this->validated(),
                $hasilKNN['kerusakan']['class'] ?? JenisKerusakan::NONE->value
            );

            DB::commit();

            return $mobil;
        } catch (\Throwable $th) {
            DB::rollBack();
            abort(500, 'Gagal menyimpan data mobil masuk.');
        }
    }
}

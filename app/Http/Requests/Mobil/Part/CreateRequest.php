<?php

namespace App\Http\Requests\Mobil\Part;

use App\Models\MobilPart;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'part_nama' => 'required|string|max:128',
            'part_qty' => 'required|numeric',
            'part_harga' => 'required|numeric'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'error' => true,
                'message' => $validator->messages()->first(),
            ], 422)
        );
    }

    public function fulfill()
    {
        $input = $this->validated();
        $mobil = $this->route('mobil');

        $jasa = new MobilPart();
        $jasa->mobil_id = $mobil->id;
        $jasa->nama = $input['part_nama'];
        $jasa->qty = $input['part_qty'];
        $jasa->harga = $input['part_harga'];
        $jasa->total_harga = (int)$input['part_qty'] * (int) $input['part_harga'];
        $jasa->save();
    }
}

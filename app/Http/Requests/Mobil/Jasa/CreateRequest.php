<?php

namespace App\Http\Requests\Mobil\Jasa;

use App\Models\MobilJasa;
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
            'jasa_nama' => 'required|string|max:128',
            'jasa_status' => 'required|string|max:132',
            'jasa_harga' => 'required|numeric'
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

        $jasa = new MobilJasa();
        $jasa->mobil_id = $mobil->id;
        $jasa->nama = $input['jasa_nama'];
        $jasa->status = $input['jasa_status'];
        $jasa->harga = $input['jasa_harga'];
        $jasa->save();
    }
}

<?php

namespace App\Http\Requests\DataUji;

use App\Actions\DataUji\CreateDataUji as Action;
use App\Enums\JenisKerusakan;
use App\Enums\Kerusakan;
use App\Models\DataUji;
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
      $attributes = Data::attributes();
      $rules = collect([
         'no_polisi' => 'required|string|max:20',
         'class' => ['required', 'string', Rule::in(JenisKerusakan::all())]
      ]);

      foreach ($attributes as $attr) {
         $rules->put($attr, ['required', 'string', Rule::in(Kerusakan::all())]);
      }

      return $rules->toArray();
   }

   public function fulfill(): DataUji
   {
      try {
         DB::beginTransaction();

         $action = new Action();
         $uji = $action($this->validated());

         DB::commit();

         return $uji;
      } catch (\Throwable $th) {
         throw $th;
      }
   }
}

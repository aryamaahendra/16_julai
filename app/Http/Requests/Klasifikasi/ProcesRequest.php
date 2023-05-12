<?php

namespace App\Http\Requests\Klasifikasi;

use App\Enums\Kerusakan;
use App\Utilities\Data;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Actions\KNN as Action;
use Illuminate\Support\Collection;

class ProcesRequest extends FormRequest
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
         'k' => 'required|numeric'
      ]);

      foreach ($attributes as $attr) {
         $rules->put($attr, ['required', 'string', Rule::in(Kerusakan::all())]);
      }

      return $rules->toArray();
   }

   public function fulfill(): array
   {
      $action = new Action();
      return $action($this->validated());
   }
}

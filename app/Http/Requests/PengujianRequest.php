<?php

namespace App\Http\Requests;

use App\Actions\ConfusionMatrix as Action;
use App\Models\Pengujian;
use Illuminate\Foundation\Http\FormRequest;

class PengujianRequest extends FormRequest
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
      return [
         'k' => 'required|numeric'
      ];
   }

   public function fulfill(): Pengujian
   {
      $action = new Action();
      return $action($this->validated());
   }
}

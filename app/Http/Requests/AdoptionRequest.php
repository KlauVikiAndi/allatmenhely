<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AdoptionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "animal_name" => "required|exists:animals,name", 
            "adopter_name" => "required|exists:adopters,name", 
            "date_of_adoption" => "required|date_format:Y-m-d",

        ];
    }
    public function messages(): array
    {
        return [
            "animal_name.required" => "Az állat neve elvárt!",
            "animal_name.exists" => "Ilyen nevű állat nem található!",
            "adopter_name.required" => "Az örökbefogadó neve elvárt!",
            "adopter_name.exitsts" => "Nincs ilyen örökbefogadó!",
            "date_of_adoption.required" => "Az időpont megadása kötelező!",
            "date_of_adoption.date_format" => "Az időpont formátuma hibás! (YYYY-MM-DD)",
        ];
    }

    public function failedValidation (Validator $validator) {

        throw new HttpResponseException (response ()->json ([

            "succes"=>false,
            "message"=>"Beviteli hiba",
            "data"=>$validator->errors()
        ]));
    }
}

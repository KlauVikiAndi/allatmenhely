<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AdopterRequest extends FormRequest
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
            
            "name"=>"required|min:3|max:20",
            "e_mail"=>"required|email|unique:adopters,e_mail",
            "phone_number" => ["required", "min:10", "regex:/^\+?[0-9]{10,15}$/"],
            "city"=> "required|min:3|max:58"
        ];
    }

    public function messages (){

       return [

        "name.required"=> "Név elvárt!",
        "name.min"=> "A név túl rövid!",
        "name.max"=> "A név túl hosszú!",
        "e_mail.required"=> "Email cím elvárt!",
        "e_mail.email"=> "Nem érvényes email forma!",
        "e_mail.unique"=> "Ezzel az email címmel már regisztráltak!",
        "phone_number.required"=>"Telefonszám elvárt!",
        "phone_number.min"=>"Túl rövid telefonszám!",
        "phone_number.regex"=>"Nem megfelelő telefonszám!",
        "city.required"=> "Településnév elvárt!",
        "city.min"=> "A településnév túl rövid!",
        "city.max"=> "A településnév túl hosszú!"

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

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
            
            "name"=>"required|min:3|max:20|unique:users,name",
            "email"=>"required|email|unique:users,email",
            "password" => ["required", "min:8", "regex:/[a-z]/", "regex:/[A-Z]/", "regex:/[0-9]/"],
            "confirm_password"=> "required|same:password"
        ];
    }

    public function messages (){

       return [

        "name.required"=> "Név elvárt!",
        "name.min"=> "A név túl rövid!",
        "name.max"=> "A név túl hosszú!",
        "name.unique"=> "A név már létezik!",
        "email.required"=> "Email cím elvárt!",
        "email.email"=> "Nem érvényes email forma!",
        "email.unique"=> "Ezzel az email címmel már regisztráltak!",
        "password.required"=>"Jelszó elvárt!",
        "password.min"=> "Túl rövid jelszó!",
        "password.regex"=>"Nem megfelelő jelszó!",
        "confirm_password.same"=>"A két jelszó nem egyezik!"

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
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AnimalAddRequest extends FormRequest
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
            
            "name" => "required|string|min:2|max:20|unique:animals,name",
            "type" => "required|string",
            "size" => "required|string",
            "date_of_birth" => "required|date",
            "date_of_admission" => "required|date",
            "description" => "required|string|min:20|max:255",
            "gender" => "required|string",
            "adopted" => "required|boolean",
            "image" => "required|url",
        ];
    }
    public function messages (){

        return[
            "name.required"=>"Az állat neve elvárt!",
            "name.min"=>"Túl rövid név!",
            "name.max"=>"Túl hosszú név!",
            "name.unique"=>"Iyen nevű állat már van!",
            "type.required"=>"Fajta elvárt!",
            "size.required"=>"Méret elvárt!",
            "date_of_birth.required"=>"Születési idő megadása kötelező!",
            "date_of_birth.date"=>"Nem megfelelő formátum!",
            "date_of_admission.required"=> "Bekerülési idő megadása kötelező!",
            "date_of_admission.date"=> "Nem megfelelő formátum!",
            "description.required"=> "Leírás megadása kötelező!",
            "description.min"=> "Túl rövid leírás!",
            "description.max"=> "Túl hosszú leírás!",
            "gender.required" => "Nem megadása kötelező!",
            "adopted.required"=>"Az örökbefogadhatóságot kötelező jelölni!",
            "image.required"=> "Fénykép feltöltése kötelelező!",
            "image.url"=>"Nem megfelelő formátum!",

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

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class AppointmentRequest extends FormRequest
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
    public function rules()
    {
        return [
            "name" => "required|string|exists:animals,name,adopted,false", // Állat neve és örökbefogadhatóság
            "appointment_time" => ["required", "date_format:Y-m-d H:i", "after:now", function ($attribute, $value, $fail) {
               
                $dateTime = Carbon::parse($value);

                //Éjszakai időpontok kizárása
                if ($dateTime->hour < 8 || $dateTime->hour >= 20) {
                    $fail('Időpontfoglalás csak 08:00 és 20:00 között lehetséges!');
                }


                // Csak egész vagy fél órás időpont engedélyezése
                if (!in_array($dateTime->minute, [0, 30])) {
                    $fail("Csak egész vagy fél órás időpont foglalható! (pl. 15:00, 15:30)");
                }

                // Hétvégék kizárása
                if ($dateTime->isWeekend()) {
                    $fail("Hétvégére nem lehet időpontot foglalni!");
                }

                // Ünnepnapok kizárása
                $holidays = [
                    "2025-01-01", "2025-03-15", "2025-04-21", "2025-05-01", "2025-08-20", "2025-10-23", "2025-12-25", "2025-12-26"
                ];

                if (in_array($dateTime->toDateString(), $holidays)) {
                    $fail("Ünnepnapra nem lehet időpontot foglalni!");
                }
            }],
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Az állat neve elvárt!",
            "name.exists" => "Ilyen nevű állat nem található vagy már örökbefogadták!",
            "appointment_time.required" => "Az időpont megadása kötelező!",
            "appointment_time.date_format" => "Az időpont formátuma hibás! (YYYY-MM-DD HH:MM)",
            "appointment_time.after" => "Csak jövőbeli időpont foglalható!",
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
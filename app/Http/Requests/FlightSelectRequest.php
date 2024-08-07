<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlightSelectRequest extends FormRequest
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
            "flights.0"=> "required",
            "flights.1"=> "nullable",
        ];
    }

    public function messages(): array{
        return [
            "flights.0.required"=> "Gidiş Uçuşu seçiniz",
        ];
    }
}

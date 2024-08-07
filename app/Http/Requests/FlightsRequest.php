<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class FlightsRequest extends FormRequest
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
            "origin" => "required|min:3|max:4",
            "destination" => "required|min:3|max:4",
            "departure_date" => [
                'required',
                'date',
                'after_or_equal:' . Carbon::today()->toDateString(),
                'before_or_equal:' . now()->addDays(355)->toDateString(),
            ],
            "passengers.*" => "nullable|integer|min:0|max:7",
            "return_date"=> "nullable|after_or_equal:departure_date",
        ];
    }

    public function messages(): array
    {
        return [
            'origin.required' => 'Nereden Alanı Boş Bırakılamaz',
            'origin.min' => 'Nereden minumum 3 karakterden oluşuyor',
            'origin.max' => 'Nereden Alanı maximum 4 karakterden oluşuyor',
            'destination.required' => 'Nereye Alanı Boş Bırakılamaz',
            'destination.min' => 'Nereye Alanı minumum 3 karakterden oluşuyor',
            'destination.max' => 'Nereye Alanı maximum 4 karakterden oluşuyor',
            'departure_date.required' => 'Gidiş Tarihi Alanı Boş Bırakılamaz',
            'departure_date.date' => 'Gidiş Tarihden oluşuyor, ',
            'departure_date.after_or_equal' => 'Gidiş Tarihi en az bugün nün tarihini alabiliyor',
            'departure_date.before_or_equal' => 'Gidiş Tarihi 355 gün sonrasına hizmet veremiyor , daha erken tarih seçiniz',

            'passengers.*.min'=> 'En az 0 yolcu olabilir',
            'passengers.*.max'=> 'En Fazla 7 yolcu olabilir',

            'return_date.after_or_equal'=> 'Dönüş Tarihi Gidiş Tarihinden Küçük Olamaz.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            
            $passengers = $this->input('passengers',[]);

            $total = array_sum($passengers);

            $adults = $passengers['ADT'] ?? 0;
            $old = $passengers['YCD'] ?? 0;
            $baby = $passengers['INF'] ?? 0;
            $children = $passengers['CHD'] ?? 0;
            $student = $passengers['STU'] ?? 0;

            if( ($baby > 0 || $children > 0) && ($adults == 0 && $old == 0) ) {
                $validator->errors()->add('passengers', 'Bebek veya çocuk yolcu seçilmesi için en az bir yetişkin veya yaşlı yolcu seçilmelidir.');
            }

            if(empty($adults) && empty($old) && empty($baby) && empty($children) && empty($student) ) {
                $validator->errors()->add('passengers', 'En az bir yolcu seçilmelidir');
            }

            if( $total > 7) { 
                $validator->errors()->add('passengers', 'En fazla 7 yolcu seçilmektedir');
            }
        });
    }
}

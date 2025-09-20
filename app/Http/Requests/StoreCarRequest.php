<?php

namespace App\Http\Requests;

use Date;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCarRequest extends FormRequest
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
            'make' => ['string', 'required','max:20'],
            'model' => ['string', 'required', 'max:20'],
            'year' => ['integer', 'min:1900','max:' . (Date::now()->year+1)],
            'color' => ['string', 'required','max:20'],
            'mileage' => ['integer','required'],
            'vin' => ['string', 'max:17','nullable'],
            'buy_price' => ['integer', 'present_unless:for_rent,true', 'min:0'],
            'rent_daily_rate' => ['decimal:0,2','present_unless:for_rent,false','min:0'],
            'rent_weekly_rate' => ['decimal:0,2','present_unless:for_rent,false','min:0'],
            'min_rental_days' => ['integer','present_unless:for_rent,false','min:1'],
            'type' => ['string',Rule::in('p','h','e'), 'required'],
            'used' => ['boolean','required'],
            'for_rent' => ['boolean','required'],
            'branch_id' => ['required','exists:branches,id'],
            
        ];
    }
}

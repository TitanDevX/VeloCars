<?php

namespace App\Http\Requests;

use Date;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCarRequest extends FormRequest
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
        $car = $this->route('car');
        $isForRent = Rule::requiredIf(function () use ($car) {
            return !$car->for_rent && $this->input('for_rent') == 1; });
            // dd($car->for_rent === true && $this->input('for_rent') === 0);
        return [
            'make' => ['string', 'max:20'],
            'model' => ['string', 'max:20'],
            'year' => ['integer', 'min:1900', 'max:' . (Date::now()->year + 1)],
            'color' => ['string', 'max:20'],
            'mileage' => ['integer',],
            'vin' => ['string', 'max:17', 'nullable', 'unique:cars,vin'],
            'buy_price' => ['nullable', 'integer', 'min:0', Rule::requiredIf(function () use ($car) {
                return $car->for_rent == true && $this->input('for_rent') == 0; })],
            'rent_daily_rate' => ['decimal:0,2', 'min:0', $isForRent],
            'rent_weekly_rate' => ['decimal:0,2', 'min:0', $isForRent],
            'min_rental_days' => ['integer', 'min:1', $isForRent],
            'type' => ['string', Rule::in('p', 'h', 'e')],
            'used' => ['boolean'],
            'for_rent' => ['boolean'],
            'branch_id' => ['exists:branches,id'],
            'sold_to_user_id' => ['nullable', 'exists:users,id']

        ];
    }
}

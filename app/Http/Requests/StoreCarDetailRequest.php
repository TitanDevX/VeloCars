<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCarDetailRequest extends FormRequest
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
         
            'engine_type' => [
                'nullable',
                'string',
                'max:50'
            ],
            'horse_power' => [
                'nullable',
                'integer',
                'min:1',
                'max:2000'
            ],
            'drivetrain' => [
                'nullable',
                'string',
                'max:20',
                Rule::in(['FWD', 'RWD', 'AWD', '4WD'])
            ],
            'top_speed' => [
                'nullable',
                'integer',
                'min:1',
                'max:500'
            ],
            'acceleration' => [
                'nullable',
                'numeric',
                'min:0.1',
                'max:30.0'
            ],
            'body_style' => [
                'nullable',
                'string',
                'max:30',
                Rule::in(['Sedan', 'Coupe', 'Hatchback', 'SUV', 'Truck', 'Van', 'Wagon', 'Convertible'])
            ],
            'number_of_doors' => [
                'nullable',
                'integer',
                'min:1',
                'max:10'
            ],
            'weight' => [
                'nullable',
                'numeric',
                'min:100',
                'max:10000'
            ],
            'weight_unit' => [
                'nullable',
                'string',
                'size:1',
                Rule::in(['k', 'p']) // k for kilograms, p for pounds
            ],
            'length' => [
                'nullable',
                'numeric',
                'min:100',
                'max:10000'
            ],
            'width' => [
                'nullable',
                'numeric',
                'min:50',
                'max:5000'
            ],
            'height' => [
                'nullable',
                'numeric',
                'min:50',
                'max:5000'
            ],
            'tire_size' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^\d{2,3}\/\d{2,3}R\d{2}$/' // Matches format like 225/55R17
            ],
            'features' => [
                'nullable',
                'string',
                'max:1000' // Adjust based on your needs
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'car_id.required' => 'The car ID is required.',
            'car_id.exists' => 'The selected car does not exist.',
            'drivetrain.in' => 'The drivetrain must be one of: FWD, RWD, AWD, or 4WD.',
            'body_style.in' => 'The body style must be a valid vehicle type.',
            'weight_unit.in' => 'The weight unit must be "k" for kilograms or "p" for pounds.',
            'tire_size.regex' => 'The tire size must be in the format like 225/55R17.',
            'horse_power.min' => 'Horse power must be at least 1.',
            'horse_power.max' => 'Horse power may not be greater than 2000.',
            'top_speed.min' => 'Top speed must be at least 1 km/h.',
            'top_speed.max' => 'Top speed may not be greater than 500 km/h.',
            'acceleration.min' => 'Acceleration must be at least 0.1 seconds.',
            'acceleration.max' => 'Acceleration may not be greater than 30 seconds.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Convert empty strings to null for nullable fields
        $this->merge([
            'engine_type' => $this->engine_type ?: null,
            'horse_power' => $this->horse_power ? (int) $this->horse_power : null,
            'drivetrain' => $this->drivetrain ?: null,
            'top_speed' => $this->top_speed ? (int) $this->top_speed : null,
            'acceleration' => $this->acceleration ? (float) $this->acceleration : null,
            'body_style' => $this->body_style ?: null,
            'number_of_doors' => $this->number_of_doors ? (int) $this->number_of_doors : null,
            'weight' => $this->weight ? (float) $this->weight : null,
            'weight_unit' => $this->weight_unit ?: 'k', // Default to kilograms
            'length' => $this->length ? (float) $this->length : null,
            'width' => $this->width ? (float) $this->width : null,
            'height' => $this->height ? (float) $this->height : null,
            'tire_size' => $this->tire_size ?: null,
            'features' => $this->features ?: null,
        ]);
    }
}

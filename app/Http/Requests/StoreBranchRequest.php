<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
            'state' => ['string', 'required'],
            'city' => ['string', 'required'],
            'street' => ['string', 'required'],
            'address' => ['string', 'required'],
            'long' => ['decimal:0,8','required'],
            'lat' => ['decimal:0,8','required'],
            
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressFormRequest extends FormRequest
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
            'current_street' => 'nullable',
            'current_city' => 'nullable',
            'current_country' => 'nullable',
            'current_zip_code' => 'nullable',
            'home_street' => 'nullable',
            'home_city' => 'nullable',
            'home_country' => 'nullable',
            'home_zip_code' => 'nullable',
        ];
    }
}

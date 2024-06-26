<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataFormRequest extends FormRequest
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
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'birthdate' => 'required',
            'sex' => 'required',
            'nationality' => 'required',
            'status' => 'required',
            'spouse' => 'required',
            'number' => 'required',
            'email' => 'required|email',
        ];
    }
}

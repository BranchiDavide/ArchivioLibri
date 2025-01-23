<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:categories,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome della categoria è obbligatorio.',
            'name.max' => 'Il nome della categoria non può superare i 255 caratteri.',
            'name.unique' => 'Il nome della categoria esiste già.',
        ];
    }
}

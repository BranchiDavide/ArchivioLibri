<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'pages' => 'nullable|integer|min:1',
            'description' => 'nullable|string|max:800',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo del libro è obbligatorio.',
            'title.max' => 'Il titolo non può superare i 255 caratteri.',
            'author_id.required' => 'L\'autore è obbligatorio.',
            'author_id.exists' => 'L\'autore selezionato non esiste.',
            'category_id.required' => 'La categoria è obbligatoria.',
            'category_id.exists' => 'La categoria selezionata non esiste.',
            'pages.integer' => 'Il numero di pagine deve essere un numero intero.',
            'pages.min' => 'Il numero di pagine deve essere almeno 1.',
            'description.max' => 'La descrizione non può superare i 800 caratteri.',
            'image.image' => 'Il file caricato deve essere un\'immagine.',
            'image.mimes' => 'L\'immagine deve essere in uno dei seguenti formati: jpeg, png, jpg o gif.',
            'image.max' => 'L\'immagine non può superare i 2MB di dimensione.',
        ];
    }
}

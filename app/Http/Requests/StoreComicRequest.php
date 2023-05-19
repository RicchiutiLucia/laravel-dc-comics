<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'description' => 'nullable|max:65535',
            'thumb' => 'required|url|max:255',
            'price' => 'required|numeric|decimal:2',
            'series' => 'required|max:100',
            'sale_date' => 'nullable|max:20',
            'type' => 'nullable|max:30'
        ];
    }

    public function messages()
    {
        return  [
            'title.required' => "il titolo e' obbligatorio",
            'title.max' => "Il titolo è massimo 50 caratteri",
            'description.max' => "lLa descizione è massimo 65535 caratteri",
            'thumb.required' => "L'url e' obbligatorio",
            'thumb.max' => "L'url è massimo 255 caratteri",
            'thumb.url' => "L'url deve essere valido",
            'price.required' => "Il prezzo e' obbligatorio",
            'price.max' => " il prezzo massimo 4 caratteri",
            'price.numeric' => "Il prezzo deve essere un numero",
            'series.required' => "La serie e' obbligatoria",
            'series.max' => "La serie è Massimo 100 caratteri",
            'sale_date.max' => "La data di vendita è massimo 20 caratteri",
            'type.max' => " Il tipo è massimo 30 caratteri"

        ];
    }
}

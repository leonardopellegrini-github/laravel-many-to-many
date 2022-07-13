<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il Titolo è obbligatorio',
            'title.min' => 'Lunghezza min :min caratteri',
            'title.max' => 'Lunghezza max :max caratteri',
            'content.required' => 'Aggiungi un messaggio',
            'content.min' => 'Lunghezza min :min caratteri'
        ];
    }
}
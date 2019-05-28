<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorageRoom extends FormRequest
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
            'photo' => 'nullable|image',
            'counts' => 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'photo.image' => 'Фото не є картинкою',
            'counts.required'  => 'A counts is required',
            'price.required'  => 'A price is required',
        ];
    }

}

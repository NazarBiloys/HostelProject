<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorageCounts extends FormRequest
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
            'adult'	=>	'required',
            'children' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'adult.required' => 'A adult is required',
            'children.required'  => 'A children is required',
        ];
    }
}

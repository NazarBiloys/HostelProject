<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorageOrder extends FormRequest
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
            'from' => 'required',
            'to' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'from.required' => 'A from is required',
            'to.required' => 'A to is required'
        ];
    }
}

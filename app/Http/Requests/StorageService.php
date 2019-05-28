<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorageService extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'messages' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'email.required' => 'A email is required',
            'email.email' => 'A email need to be email form',
            'message.required' => 'A message is required'
        ];
    }
}

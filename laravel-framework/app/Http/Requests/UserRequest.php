<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|email:rfc|unique:users,email'
        ];

        if ($this->method() === 'POST')
        {
            return array_merge($rules, [
                'password' => 'required|string',
                'address.street' => 'required|string',
                'address.number' => 'required|string',
                'address.zipcode' => 'required|string',
                'address.neighborhood' => 'required|string',
                'address.city' => 'required|string',
            ]);
        }

        if ($this->method() === 'PUT')
        {
            return $rules;
        }
    }
}

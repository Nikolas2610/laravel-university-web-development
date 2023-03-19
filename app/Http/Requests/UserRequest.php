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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:120',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).+$/',
            'address' => 'required|string|max:120',
            'municipality' => 'required',
            'county' => 'required',
            'fuel' => 'required',
            'username' => 'required|min:6|unique:users,username',
            'afm' => 'required|numeric|digits:9|unique:users,afm',
            'password_confirmation' => 'required'
        ];
    }
}

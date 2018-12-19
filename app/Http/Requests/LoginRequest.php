<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username'=>'required',
            'password'=>'required|min:3'
        ];
    }

    public function messages ()
    {
        return [
            'username.required'=>'账号不能为空',
            'password.required'=>'密码不能为空',
            'password.min:3'=>'密码长度不符',
        ];
    }
}

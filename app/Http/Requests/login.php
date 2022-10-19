<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class login extends FormRequest
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
            'email' => 'required|email',
    		'password' => 'required|min:6|max:32',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Bạn chưa nhập email',
    		'email.email' => 'Bạn chưa nhập đúng định dạng email',
    		'password.required' => 'Bạn chưa nhập mật khẩu',
    		'password.min' => 'Mật khẩu có ít nhất 6 kí tự',
    		'password.max' =>'Mật khẩu tối đa 32 kí tự',
        ];
    }
}

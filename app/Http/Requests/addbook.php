<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addbook extends FormRequest
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
            'numberphone' => 'required',
            'location[]' => '',
            'id_ticket'=>''
        ];
    }
    public function messages()
    {
        return [
            'numberphone.required' =>'Bạn chưa nhập phone',
        ];
    }
}

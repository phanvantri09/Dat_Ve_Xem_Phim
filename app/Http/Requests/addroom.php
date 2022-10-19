<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addroom extends FormRequest
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
            'name' => 'required|unique:users|max:255',
            'amount' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Bạn chưa nhập tên',
            'name.unique' =>'Đã tồn tại',
            'name.max' =>'Tên có tối đâ 255 kí tự',
            'amount.required' => 'Bạn chưa nhập amount',
        ];
    }
}

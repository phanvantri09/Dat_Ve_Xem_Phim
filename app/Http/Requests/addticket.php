<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addticket extends FormRequest
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
            'id_room' => 'required',
            'price' => 'required',
            'name_film' => 'required',
            'link' => 'required',
            'time' => 'required',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'id_room.required' =>'Bạn chưa nhập room',
            'price.required' => 'Bạn chưa nhập price',
            'name_film.required' =>'Bạn chưa nhập tên film',
            'link.required' => 'Bạn chưa nhập link',
            'time.required' =>'Bạn chưa nhập time',
            'content.required' => 'Bạn chưa nhập content',
            
        ];
    }
}

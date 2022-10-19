<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editticket extends FormRequest
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
            'id_ticket'=> 'required',
            'id_room' => 'required',
            'price' => 'required',
            'name_film' => 'required',
            'link' => 'required',
            'time' => '',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'id_ticket.required' =>'Bạn chưa nhập room',
            'id_room.required' =>'Bạn chưa nhập room',
            'price.required' => 'Bạn chưa nhập price',
            'name_film.required' =>'Bạn chưa nhập tên film',
            'link.required' => 'Bạn chưa nhập link',
            'content.required' => 'Bạn chưa nhập content',
            
        ];
    }
}

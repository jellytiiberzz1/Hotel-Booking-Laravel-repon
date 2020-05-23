<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class   StoreRoomsRequest extends FormRequest
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
           'number_room' => 'required|min:2|max:255',
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được bỏ trống',

        ];
    }
    public function attributes(){
        return [
            'number_room' => 'Tên phòng',
        ];
    }
}

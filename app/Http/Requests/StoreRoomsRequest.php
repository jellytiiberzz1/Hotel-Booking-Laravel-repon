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
           'number_room' => 'required|min:2|max:255|unique:rooms,number_room',
           'image' => 'required|image',
           'description' => 'required|min:10',
           'price' => 'required|numeric',
           'sale' => 'numeric',
           'created_at' => 'required|date|after:tomorrow',
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute tối thiểu có 2 ký tự',
            'max' => ':attribute tối đa có 255 ký tự',
            'numeric' => ':attribute phải là một số ',
            'image' => ':attribute không là hình ảnh',
            'after' => ':attribute vào phải lớn hơn hoặc bằng ngày hiện tại',

        ];
    }
    public function attributes(){
        return [
            'number_room' => 'Tên phòng',
            'description' => 'Mô tả phòng',
            'price' => 'Đơn giá phòng',
            'sale' => 'Giá khuyến mại',
            'image' => 'Ảnh minh họa',
            'created_at' => 'ngày vào',
        ];
    }
}

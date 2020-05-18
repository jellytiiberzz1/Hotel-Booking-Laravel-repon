<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'price' => 'required|numeric',
            'usd' => 'required|numeric',
            'image' => 'required|image'
        ];

    }
    public function messages()
    {
        return[
            'required' => ':attribute không được để trống',
            'min' => ':attribute ít nhất phải 2 ký tự',
            'max' => ':attribute tối đa 255 ký tự',
            'numeric' => ':attribute phải là số',
            'image' => ':attribute không đúng định dạng',
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Tên loại phòng',
            'price'=>'Giá phòng',
            'usd'=>'Giá ngoại tệ',
            'image'=>'Hình ảnh',
        ];
    }
}

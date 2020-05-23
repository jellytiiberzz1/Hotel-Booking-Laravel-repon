<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name'=> 'required|min:2|max:255',
            'email' => 'required|email',
            'CMND' => 'required|numeric',
            'phone' => 'required|numeric',
            'address' => 'required|min:2|max:255'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'email' => ':attribute không đúng định dạng địa chỉ email',
            'numeric' => ':attribute không đúng định dạng số ',
            'min' => ':attribute tối thiểu có 2 ký tự',
            'max' => ':attribute tối đa có 255 ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Họ và tên',
            'email' => 'Địa chỉ email',
            'CMND' => 'Số chứng minh nhân dân',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ nơi ở',
        ];
    }
}

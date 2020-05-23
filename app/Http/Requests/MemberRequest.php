<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'name'=> 'required|min:5|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'address' => 'required|min:5|max:255',
            'password' => 'required|min:8|max:255',
            'password2' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'email' => ':attribute không đúng định dạng địa chỉ email',
            'unique' => ':attribute đã được sử dụng',
            'numeric' => ':attribute không đúng định dạng số ',
            'min' => ':attribute tối thiểu có 5 ký tự',
            'max' => ':attribute tối đa có 255 ký tự',
            'same' => ':attribute không trùng khớp',
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
            'password' => 'Mật khẩu',
            'password2' => 'Mật khẩu',
        ];
    }
}

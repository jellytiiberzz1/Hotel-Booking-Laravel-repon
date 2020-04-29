<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'name' => 'required|min:5|max:255',
            'email' => 'required|email|max:255',
            'CMND' => 'required|numeric',
            'address' => 'required|min:5|max:255',
            'phone' => 'required|numeric',
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'Họ và Tên không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'CMND.required' => 'Card ID không được bỏ trống',
            'CMND.numeric' => 'Card ID phải là số',
            'address.required' => 'Địa chỉ không được bỏ trống',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'name.min' => 'Họ và Tên phải có tối thiểu 5 ký tự',
            'address.min' => 'Họ và Tên phải có tối thiểu 5 ký tự',
            'name.max' => 'Họ và Tên phải có tối đa 255 ký tự',
            'email.max' => 'Email phải có tối đa 255 ký tự',
            'address.max' => 'Địa chỉ phải có tối đa 255 ký tự',
            'email.email' => 'Email không hợp lệ',
            'phone.numeric' => 'số phone không hợp lệ'
        ];
    }
}

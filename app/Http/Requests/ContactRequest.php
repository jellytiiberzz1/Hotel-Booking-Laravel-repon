<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fullname' => 'required|min:2|max:150',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return[
            'fullname.required' => 'Họ và tên không được bỏ trống',
            'fullname.min' => 'Họ và tên ít nhất 2 ký tự',
            'fullname.max' => 'Họ và tên tối đa',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'phone.numeric' => 'Số điện thoại phải là số',
            'message.required' => 'Lời nhắn không được bỏ trống',
            'message.min' => 'Lời nhắn ít nhất 6 ký tự',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiec extends FormRequest
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
            'quantity'=>'required|numeric',
            'price' => 'required|numeric',
            'created_at' => 'required|date|after:tomorrow',
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được bỏ trống',
            'numeric' => ':attribute phải là một số ',
            'after' => ':attribute vào phải lớn hơn hoặc bằng ngày hiện tại',
        ];
    }
    public function attributes(){
        return [
            'price' => 'Giá dịch vụ',
            'quantity' => 'Số lượng',
            'created_at' => 'Ngày vào',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'Email' => 'required|email|unique:users,email|max:200',
            'Password'   => 'required|min:6|max:200',
            'ConfirmPassword'=>'same:Password',
            'FullName'=> 'required|max:200',
            'Phone' => 'required|min:10|numeric',
            'Address' => 'required',
            'TypeAcc'=>'required'

        ];
    }
    public function messages()
    {
        return [
        'Email.required'=> "Vui lòng nhập email.",
        'Email.unique'=> 'Email đã có người sử dụng.',
        'Email.email'=> 'Email không đúng. Mời nhập lại.',
        'Password.required' =>"Vui lòng nhâp Password.",
        'Password.min' => 'Password phải lớn hơn hoặc bằng 6 ký tự.',
        'ConfirmPassword.same' => 'Cập nhật mật khẩu sai.',
        'Phone.required'=> 'Số điện thoại không được để trống.',
        'Phone.min'=>'Số điện thoại vừa nhập không đúng.',
        'Phone.numeric'=> 'Số điện thoại vừa nhập không đúng.',
        'Address.required' => 'Địa chỉ vừa nhập không đúng.',
        'TypeAcc.required' => 'Bạn chưa chọn nghề.'
        ];
    }
}

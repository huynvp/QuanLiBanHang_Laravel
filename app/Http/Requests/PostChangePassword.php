<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PostChangePassword extends FormRequest
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
            'oldpass' => [
                'required',
                'min:6',
                function($attribute, $value, $fail) {
                    $user = User::where('username', Auth::user()->username)->get();
                    if(!Hash::check($value, $user[0]['password'] )) {
                        return $fail('Mật khẩu cũ không trùng khớp');
                    }
                }
            ],
            'newpass' => 'required|min:6',
            'renewpass' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'oldpass.required' => 'Không được bỏ khoảng này',
            'oldpass.min'  => 'Mật khẩu tối thiểu 6 chữ số',
            'newpass.required' => 'Không được bỏ khoảng này',
            'newpass.min'  => 'Mật khẩu tối thiểu 6 chữ số',
            'renewpass.required' => 'Không được bỏ khoảng này',
            'renewpass.min'  => 'Mật khẩu tối thiểu 6 chữ số',
        ];
    }
}

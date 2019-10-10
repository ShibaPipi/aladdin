<?php

namespace App\Http\Requests\Api;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
                return [
                    'id' => ['required,exists:shop_user,id']
                ];
            case 'POST':
                return [
                    'name' => ['required', 'max:12', 'unique:users,name'],
                    'password' => ['required', 'max:16', 'min:6']
                ];
            case 'PUT':
            case 'PATCH':
            case 'DELETE':
            default:
                return [];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => '用户 :attribute 必传',
            'id.exists' => '用户不存在',
            'name.unique' => '用户名已经存在',
            'name.required' => '用户名不能为空',
            'name.max' => '用户名最大长度为 :max 个字符',
            'password.required' => '密码不能为空',
            'password.max' => '密码长度不能超过 :max 个字符',
            'password.min' => '密码长度不能小于 :min 个字符'
        ];
    }
}

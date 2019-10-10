<?php

namespace App\Http\Requests\Api;

class PostRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
                return [
                    'id' => ['required', 'exists:posts']
                ];
            case 'POST':
                return [
                    'id' => ['required'],
                    'title' => ['required', 'max:12'],
                    'content' => ['required']
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
            'id.required' => '文章 :attribute 必传',
            'title.required' => '文章标题不能为空',
            'title.max' => '文章标题不能超过 :max 个字符',
            'content.required' => '文章内容不能为空',
        ];
    }
}

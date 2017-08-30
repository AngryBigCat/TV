<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrawLuckyRequest extends FormRequest
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
            'num' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'num.required' => '请输入您需要抽取的人数',
            'num.integer' => '参数值必须为整数'
        ];
    }
}

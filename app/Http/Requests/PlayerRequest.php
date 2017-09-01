<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            'answer_1' => 'required',
            'answer_2'=> 'required',
            'answer_3'=> 'required',
            'answer_4'=> 'required',
            'sex'=> 'required',
            'address'=> 'required',
            'name'=> 'required|max:10',
            'phone'=> 'required|regex:/^1[34578]{1}[\d]{9}$/|unique:players,phone'
        ];
    }

    public function messages()
    {
        return [
            'phone.regex' => '您输入的手机号码格式不正确'
        ];
    }

    public function formatErrors(Validator $validator)
    {
        return [
            'code' => 1,
            'errors' => $validator->errors()->all()
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title' => 'required|max:100',
            'body'  =>  'requered|min:50'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator){
            $validator->errors()->add('field' , 'Something is wrong with this field!');
        });
    }
    public function message(){
        return [
            // 'title.required' => 'Tieu de khong dc trong',
            // 'body.required' => 'Noi dung khong dc trong'
            'required' => ':attribute khong duoc trong'
        ];
    }
    public function attributes(){
        return [
            'title' => 'Tieu de bai viet',
            'body'  =>  'Noi dung bai viet'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'bail | required |unique:products| max:255 | min:10',
            'price'=>'bail | required | numeric',
            'category_id'=>'required',
            'content'=>'required'
        ];
    }
    public function messages()
    {
    return [
        'name.required' => 'Ten khong duoc bo trong',
        'name.unique' => 'Ten khong duoc phep trung',
        'name.max' => 'Ten khong duoc phep qua 255 ky tu',
        'name.min' => 'Ten khong duoc phep it hon 10 ky tu',
        'price.numeric' => 'Gia tien phai la so',
        'price.required' => 'Gia tien khong duoc de trong',
        'category_id.required' => 'Danh muc khong duoc de trong',
        'content.required' => 'Noi dung khong duoc de trong',
        ];
    }
}

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|unique:products|max:255|min:5',
            'price'=>'required',
            'category_id'=>'required',
            'contents'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên không được phép trùng nhau',
            'name.max' => 'Tên không được phép quá 255 ký tự',
            'name.min' => 'Tên không được phép dưới 5 ký tư',
            'price.required' => 'Giá không được để trống',
            'category_id.required' => 'Danh muc không được để trống',
            'category_id.required' => 'Danh muc không được để trống',
            'contents.required' => 'Nội dung không được để trống',

        ];
    }

}

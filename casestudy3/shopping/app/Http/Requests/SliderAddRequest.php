<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'required|unique:sliders|max:255|min:5',
            'description' => 'required',
            'image_path' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'ten khong duoc trong',
            'name.unique' => 'ten khong duoc trung nhau',
            'name.max' => 'ten khong duoc qua 255 ky tu',
            'name.min' => 'ten khong duoc it hon 5 ky tu',
            'description.required' => 'menu khong duoc de trong',
            'image_path.required' => ' anh khong duoc de trong',
        ];
    }
}

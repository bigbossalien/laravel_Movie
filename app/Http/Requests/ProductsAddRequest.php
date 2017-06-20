<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductsAddRequest extends Request
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
            'sourceImg' => 'required|dimensions:max_width=300,max_height=450',
            'content'   => 'required',
            'intro'     =>  'required|max:500',
            'trailer'   =>  'url',
        ];
    }
    public function messages()
    {
        return [
            'sourceImg.required' => "Ảnh bìa không được để trống",
            'sourceImg.dimensions' => "Ảnh phải kích thước WxH 300x450",
            'content.required'   => "Nội dung không được để trống ",
            'intro.max'          => "Giới thiệu tối đa 500 từ",
            'intro.required'     => "Giới thiệu không được để trống ",
            'trailer.url'        => "Bạn phải nhập một link ",
        ];
    }
}

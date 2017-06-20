<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductsEditRequest extends Request
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
            'sotap'     => 'numeric',
            'content'   => 'required',
            'intro'     =>  'required|min:100|max:500',
            'trailer'   =>  'required|url',
            'sourceImg' =>  'dimensions:max_width=300,max_height=450',
        ];
    }
    public function messages()
    {
        return [
            'sotap.numeric'      => "Số tập phải là số",
            'content.required'   => "Nội dung không được để trống ",
            'intro.required'     => "Giới thiệu không được để trống ",
            'intro.min'          => "Giới thiệu tối thiểu 100 ký tự",
            'intro.max'          => "Giới thiệu max 800 ký tự",
            'trailer.required'   => "Yêu cầu nhập link trailer",
            'trailer.url'        => "Bạn phải nhập một link ",
            'sourceImg.dimensions' => "Ảnh phải có kích thước WxH 300x350",
        ];
    }
}

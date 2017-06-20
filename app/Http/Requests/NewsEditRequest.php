<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsEditRequest extends Request
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
            'title'     =>'required',
            'intro'     =>'required|max:500',
            'content'   =>'required',
        ];
    }
    public function messages(){
        return [
            'title.required'     => "Tiêu đề không được để trống !",
            'intro.required'     =>'Giới thiệu không được để trống !',
            'intro.min'          =>'Giới thiệu tối đa 500 từ !',
            'content.required'   =>'Nội dung không được để trống !',
        ];
    }
}

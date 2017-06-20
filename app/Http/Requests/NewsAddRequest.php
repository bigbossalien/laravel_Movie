<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsAddRequest extends Request
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
            'title'     =>'required|unique:lrv12_news,title',
            'intro'     =>'required|max:500',
            'content'   =>'required',
            'sourceImg' =>'required',
        ];
    }
    public function messages(){
        return [
            'title.required'     => "Tiêu đề không được để trống !",
            'title.unique'       =>'Tiêu đề này đã tồn tại !',
            'intro.required'     =>'Giới thiệu không được để trống !',
            'intro.max'          =>'Giới thiệu không quá 500 từ !',
            'content.required'   =>'Nội dung không được để trống !',
            'sourceImg.required' =>'Ảnh bìa phải được chọn !',
        ];
    }
}

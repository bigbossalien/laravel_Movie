<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SlideAddRequest extends Request
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
            'sourceImg' => 'required|dimensions:min_width=800,min_height=500,max_width=1000,max_height=550',
            'title'     =>'required|unique:lrv12_slides,title',
        ];
    }
    public function messages()
    {
        return [
            'sourceImg.required' => 'Ảnh Slide không được để trống !',
            'title.required'     =>  'Tiêu đề không được để trống !',
            'title.unique'       =>  'Tiêu đề này đã tồn tại !',
            'sourceImg.dimensions' => 'Ảnh phải có kích thước WxH trong khoảng [800x500,1000x550]',
        ];
    }
}

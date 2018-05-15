<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveHotelRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        return [
            'title_hotel' => 'required',
            'content_hotel' => 'required',
            'description' => 'required',
//            'fileToUpload' => 'required | mimes:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'title_hotel.required' => 'Vui lòng nhập tên khách sạn ',
            'content_hotel.required' => 'Vui lòng nhập mô tả khách sạn  ',
            'description.required' => 'Vui lòng nhập giới thiệu khách sạn  ',
//            'fileToUpload.required' => 'Vui lòng chọn hình ảnh đại diện cho khách sạn ',
//            'fileToUpload.mimes' => 'Vui lòng chọn hình lại định dạng file ảnh',
        ];

    }

}


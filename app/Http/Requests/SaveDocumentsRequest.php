<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveDocumentsRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        return [
            'title' => 'required',
            'no_key' => 'required',
            'date' => 'required',
            'fileToUpload' => 'required | mimes:pdf'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tên văn bản ',
            'no_key.required' => 'Vui lòng nhập số ký hiệu văn bản ',
            'date.required' => 'Vui lòng nhập ngày ban hành văn bản ',
            'fileToUpload.required' => 'Vui lòng chọn tài liệu đính kèm',
            'fileToUpload.mimes' => 'Vui lòng chọn hình lại định dạng file đính kèm dạng pdf',
        ];

    }

}


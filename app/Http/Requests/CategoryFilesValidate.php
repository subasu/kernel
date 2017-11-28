<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFilesValidate extends FormRequest
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
            //
            'file' => 'max:150000|image'
        ];
    }
    public function messages()
    {
        return
            [
                'file.max' => ' حجم فایل یا فایل های انتخاب شده بیش از حد مجاز میباشد',
                'file.image' => 'پسوند فایل یا فایل های انتخاب شده  مجاز نمیباشد'
            ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRegistrationValidation extends FormRequest
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
        return
            [
                'userCellphone' => 'required|regex:/(0)[0-9]{9}/'
            ];
    }

    public function messages()
    {
        return
            [
               'userCellphone.required' => 'وارد کردن شماره موبایل الزامی است',
               'userCellphone.regex'    => 'شماره موبایل را بطور صحیح وارد نمائید، مثلا : 09370491215'
            ];
    }
}

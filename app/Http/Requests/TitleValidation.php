<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class TitleValidation extends FormRequest
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
                 'title' => 'required'
        ];
    }
//    public function errors()
//    {
//        $errors =
//                        [
//                            'title.required' => 'وارد کردن فیلد عنوان الزامی است ، لطفا فیلد عنوان را پرنمائید و سپس درخواست خود را ثبت کنید'
//                        ];
//        return $this->message($errors);
//    }

    public function response(array $errors)
    {
        $transformed = [];

        foreach ($errors as $field => $message) {
            $transformed[] = [
                'field' => $field,
                'message' => $message[0]
            ];
        }

        return response()->json([
            'errors' => $transformed
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}

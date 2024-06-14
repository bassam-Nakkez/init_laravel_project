<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class GetHistoryCurrentTravelRequest extends FormRequest
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
            'userId' => ['required','integer','exists:users,userId'],
        ];
    }

    public function messages()
    {
        return [
            "userId.required" => " معرف المستخدم مطلوب",
            "userId.integer" => "معرف المستخدم يجب ان يكون رقم",
            "userId.exists" => "المستخدم غير موجودة الرجاء تحمبل الصفحة مجددا واعادة المحاولة",
        ];
    }
}

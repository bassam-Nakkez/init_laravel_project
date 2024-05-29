<?php
namespace App\Http\Requests\publicRequests;


use Illuminate\Foundation\Http\FormRequest;

class LoginByEmailRequest extends FormRequest
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




    public function messages()
    {
        return [
            "email.required" => "البريد الالكتروني مطلوب",
            "password.required" => "كلمة المرور مطلوبة",
            "email.email" => "البريد الالكتروني غير صالح",
            "password.min" => "يجب ان يتجاوز طول كلمة المرور الثمانية احرف",
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'         => 'required|email',
            'password'       =>'required|min:8',        
        ];
    }
}

<?php
namespace App\Http\Requests\CompanyRequests;


use Illuminate\Foundation\Http\FormRequest;

class AddCompanyRequest extends FormRequest
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
            'email'=>['required','email','unique:entity_auth_information'],
            'password' => [
                'required',
                'min:8',
            ],
            "name" => ['required','max:25','min:3'],
            "subscribeId" => ['required', 'integer', 'exists:subscribes,subscribeId'],
            'aboutAs'=> ['required'],
            'logo' =>  ['required'],
        ];
    }


    public function messages()
    {
        return [
            "email.required" => "البريد الالكتروني مطلوب",
            "email.email" => "الرجاء ادخال بريد الكتروني صالح",
            "email.unique" => "البريد الالكترني غير متاح",
            "password.required" => "رقم السر مطلوب",
            "name.required" => "الاسم مطلوب",
            "subscribeId.required" => "معرف الاشتراك مطلوب",
            // "phoneNumber.numeric" => "يجب ألا يحتوي رقم الهاتف على احرف",
            // "phoneNumber.digits" => "يجب ألا يتجاوز رقم الهاتف العشر خانات",
            "password.min" => "يجب ان يتجاوز طول كلمة المرور الثمانية احرف",
            "name.min" => "يجب ان يتجاوز طول الاسم الثلاثة احرف",
            "name.max" => "يجب ان لا يتجاوز طول الاسم 25 حرف",
            "subscribeId.exists" => "معرف الاشتراك غير موجود",
        ];
    }
}

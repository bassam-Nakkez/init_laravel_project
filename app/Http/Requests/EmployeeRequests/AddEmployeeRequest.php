<?php
namespace App\Http\Requests\EmployeeRequests;


use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeRequest extends FormRequest
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
            "phoneNumber.required" => "رقم الهاتف مطلوب",
            "password.required" => "رقم السر مطلوب",
            "firstName.required" => "الاسم مطلوب",
            "lastName.required" => "الكنية مطلوب",
            "gendor.required" => "الجنس مطلوب",
            "companyId.required" => "معرف الشركة مطلوب",
            "birthDay.required" => "تاريخ الميلاد مطلوب",
            "email.required" => "البريد الالكتروني مطلوب",
            "email.email" => "الرجاء ادخال بريد الكتروني صالح",
            "companeId.integer" => "يجب أن يكون معرف الشركة رقم",
            "companeId.exists" => "معرف الشركة غير موجود",
            "password.min" => "يجب ان يتجاوز طول كلمة المرور الثمانية احرف",
            "birthDay.date_format" => "التاريخ يجب ان يكون من الشكل يوم-شهر-سنة",
            "gendor.in" => "الجنس يجب ان يكون ذكر او أنثى",
            "firstName.min" => "يجب ان يتجاوز طول الاسم الثلاثة احرف",
            "firstName.max" => "يجب ان لا يتجاوز طول الاسم 25 حرف",
            "lastName.min" => "يجب ان يتجاوز طول الكنية الثلاثة احرف",
            "lastName.max" => "يجب ان لا يتجاوز طول الكنية 25 حرف",
            // 'image' =>
            "email.unique" => "البريد الالكترني غير متاح",

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
            "firstName" => ['required', 'max:25', 'min:3', 'string'],
            "lastName" => ['required', 'max:25', 'min:3', 'string'],
            "gendor" => ['required', 'string', 'in:ذكر,أنثى'],
            "companyId" => ['required', 'integer', 'exists:companies,companyId'],
            "birthDay" => ['required', 'date_format:Y-m-d', 'string'],
            'email' => ['required', 'email','unique:entity_auth_information'],
            // 'image'=>['required','numeric','digits:10'],
            'password' => [
                'required',
                'string',
                'min:8',
            ],
        ];
    }
}

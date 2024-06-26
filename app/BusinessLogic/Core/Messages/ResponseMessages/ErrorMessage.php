<?php
namespace App\BusinessLogic\Core\Messages\ResponseMessages;


class ErrorMessage
{

    public string $var;
    static $passwordWrong   = "كلمةالمرور غير صحيحة";
    static $ErrorUserType   = "نوع المستخدم المرسل غير صحيح";
    static $ErrorGenderType = "الجنس يبدو غير صحيح";
    static $fildCreate      = "لم يتم انشاء العنصر الرجاء اعادة المحاولة";
    static $errorNotExists    = 'غير موجود';
    static $errorExists       = "موجود مسبقا";
    static $AccountNotFound    = 'الرجاء التأكد من صحة المعلومات المدخلة و المحاولة مجدداً';
    static $ConnectionProblem    = 'يوجد مشكلة في الاتصال';
    static $errorOccurred       = 'حدث خطأ ما يرجى اعادة المحاولة';
    static $AgeIsNotAcceptable  = 'عمر الشخص يجب أن يكون أكبر من 15 عامًا';
    static $NoCities = "لا يوجد مدن مرتبطة بالبلد المختارة ";
    static $NoStations = "لا يوجد محطات";
    static $NoSearchResult ="لا يوجد نتائج";
    static $ExistsStation ="المحطة مجودة مسبقاً";
    static $ExistsSubscribe ="الاشتراك مجود مسبقاً";

    static $ExistsFeature = "عذراً الميزة موجودة مسبقاً";
    static $NotExistItem = "العنصر غير موجود";
    static $ExistsPullmanType = "عذراً نوع البولمان موجود مسبقاً";
    static $followFiled = "عملية متابعة الشرمة فشلت ";
    static $unfollowFiled = "عملية الغاء متابعة الشرمة فشلت ";
    static $filedGetTravelMatrix = " يوجد خطأ الرجاء اعادة المحاولة  ";
    static $someThingWentWrong = "حدث خطأ ما ";
    static $AlreadyReservation = "تم حجز المقعد مسبقا الرجاء اعادة المحاولة";
    static $WrongReservation = "يوجد خطأ في اضافة الحجز الرجاء اعادة المحاولة";
    static $ReservationSuccessfully = 'تم الـحـجـز بـنجـاح';










}

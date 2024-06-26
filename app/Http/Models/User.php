<?php
namespace App\Http\Models;

use Exception;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use App\BusinessLogic\Core\Options\Gender;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\UserEntity;
use App\BusinessLogic\Core\Messages\ResponseMessages\ErrorMessage;

class User extends Authenticatable  implements UserEntity
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table      = 'users';
    protected $primaryKey ='userId';




    public function getFirstName() : String {
        return $this->firstName;
    }

    public function setFirstName($firstName) : void {
        $this->firstName = $firstName;
    }

    public function getLastName() : String {
        return $this->lastName;
    }

    public function setLastName($lastName) : void {
        $this->lastName = $lastName;
    }

    public function getPhoneNumber() : String{
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber) : void{
        $this->phoneNumber = $phoneNumber;
    }

    public function getGendor() : String{
        return $this->gendor;
    }

    public function setGendor($gendor) : void{
        if($gendor == Gender::female->value || $gendor == Gender::male->value){
            $this->gendor = $gendor;
        }
        else{
            throw new Exception(ErrorMessage::$ErrorGenderType);
        }
    }

    public function getbirthDay() : String{
        return $this->birthDay;
    }

    public function setbirthDay($birthDay) : void{
        $this->birthDay = $birthDay;
    }

    public function getPassword() : String{
        return $this->password;
    }

    public function setPassword($password) : void{
        $this->password = Hash::make($password);
    }


    public function getPersonalId() : String{
        return $this->personalId;
    }

    public function setPersonalId($personalId) : void{
        $this->personalId = $personalId;
    }



    public function getAttributes():array { return $this->attributes; }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'phoneNumber',
        'gendor',
        'birthDay',
        'password',
        'personalId'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the follows for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function follows()
    {
        return $this->hasMany(Follow::class, 'userId', 'userId');
    }
    
    
    /**
     * Get all of the notifications for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany(UserNotification::class, 'userId', 'userId');
    }
    



}

<?php
namespace App\Http\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\AdminEntity;

 class Admin  extends Authenticatable implements AdminEntity
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admins';

    protected $primaryKey = 'adminId';
    
    
    public function getName() : String {
        return $this->attributes['name'];
    }

    public function setName($name) : void {
        $this->name = $name;
    }

    // public function getPhoneNumber() : String{
    //     return $this->phoneNumber;
    // }

    
    // public function setPhoneNumber($phoneNumber) : void{
    //     $this->phoneNumber = $phoneNumber;
    // }



    public function setData($data){$this->attributes = $data;}

    public function id():int {return $this->attributes['adminId'];}




    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
       // 'phoneNumber',
        'password',
        'authId',
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


}

<?php
namespace App\Http\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\BusinessLogic\Interfaces\EntityInterfaces\RoleEntity;

class Role extends Authenticatable  implements RoleEntity
{
    use HasApiTokens, HasFactory, Notifiable;


    public function getPassword() : String{
        return $this->password;
    }

    public function setPassword($password) : void{
        $this->password = Hash::make($password);
    }
    public function getEmail(){return $this->attributes['email'];}

    public function getType() :int
    {return $this->attributes['type'];}

    public function getAttributes():array{return $this->attributes;}


    
    protected $table = 'entity_auth_information';

    protected $primaryKey = 'authId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "type",
        "email_verified_at",
        'remember_token',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        "email_verified_at",
    ];


}

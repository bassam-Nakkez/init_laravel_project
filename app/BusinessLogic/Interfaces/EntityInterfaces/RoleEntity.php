<?php
namespace App\BusinessLogic\Interfaces\EntityInterfaces;


interface RoleEntity  extends BaseEntity{

    public function getEmail();

    public function getType () : int;
    
    public function getPassword() : string;

    public function getAttributes() : array;
}
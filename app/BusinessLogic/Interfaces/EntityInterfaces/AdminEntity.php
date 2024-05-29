<?php
namespace App\BusinessLogic\Interfaces\EntityInterfaces;

interface AdminEntity extends BaseEntity {


    public function setData($data);

    public function id() : int;

    
}
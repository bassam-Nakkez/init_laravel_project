<?php

namespace Database\Factories;

use App\Http\Models\Role;
use App\Http\Models\Company;
use App\Http\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Employee::class;
    public function definition()
    {
        random_int(0,1) == 1 ? $value = 'ذكر':$value ='انثى';

        return [

            'firstName'=> $this->faker->firstName(),
            'lastName'=>$this->faker->lastName(),
            'gendor'=>$value,
            'birthDay' =>$this->faker->date(),
            'authId' =>  Role::inRandomOrder()->first()->authId,
            'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_W6uTt4zmRdO6Gc-AFIGflHAHoaZ8Ajdu8Q&s',
            "companyId" => $this->faker->randomElement(Company::pluck('companyId')),
            'type'=>$this->faker->numberBetween(1,2),
            
        ];
    }
}

<?php

namespace Database\Factories;

use App\Http\Models\Employee;
use App\Http\Models\EmployeeTravail;
use App\Http\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeTravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = EmployeeTravail::class;

    public function definition()
    {
        return [
            "travelId" => $this->faker->randomElement(Travel::pluck('travelId')),
            "employeeId" => $this->faker->randomElement(Employee::pluck('employeeId')),

        ];
    }
}

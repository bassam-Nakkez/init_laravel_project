<?php

namespace Database\Factories;

use App\Http\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Role::class;

    
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->email(),
            'password'=> Hash::make('123456789'),
            "type"=>$this->faker->numberBetween(0,2),
        ];
    }
}

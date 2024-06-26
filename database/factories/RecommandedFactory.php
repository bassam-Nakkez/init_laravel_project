<?php

namespace Database\Factories;

use App\Http\Models\Company;
use App\Http\Models\Recommand;
use App\Http\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecommandedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Recommand::class;

    public function definition()
    {
        return [
            "userId" => $this->faker->randomElement(User::pluck('userId')),
            "companyId" => $this->faker->randomElement(Company::pluck('companyId')),
        ];
    }
}

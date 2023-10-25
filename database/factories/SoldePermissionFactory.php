<?php

namespace Database\Factories;

use App\Models\SoldePermission;
use Illuminate\Database\Eloquent\Factories\Factory;

class SoldePermissionFactory extends Factory
{

    /**
     * the name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = SoldePermission::class; 


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "solde" => $this->faker->randomNumber(1, false),
            "employee_id" => rand(1, 30)
        ];
    }
}

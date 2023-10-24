<?php

namespace Database\Factories;

use App\Models\SoldeConge;
use Illuminate\Database\Eloquent\Factories\Factory;

class SoldeCongeFactory extends Factory
{

    /**
     * the name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = SoldeConge::class; 


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "solde" => $this->faker->randomNumber(1, false),
            "employee_id" => rand(1, 50)
        ];
    }
}

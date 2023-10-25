<?php

namespace Database\Factories;

use App\Models\SoldeSortie;
use Illuminate\Database\Eloquent\Factories\Factory;

class SoldeSortieFactory extends Factory
{

    /**
     * the name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = SoldeSortie::class; 


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

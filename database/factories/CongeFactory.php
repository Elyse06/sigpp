<?php

namespace Database\Factories;

use App\Models\Conge;
use Illuminate\Database\Eloquent\Factories\Factory;

class CongeFactory extends Factory
{

    /**
     * the name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = Conge::class; 

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "sldtotcon" => $this->faker->randomNumber,
            "sldeffcon" => $this->faker->randomNumber,
            "sldrstcon" => $this->faker->randomNumber,
            "debutcon" => $this->faker->date,
            "fincon" => $this->faker->date,
            "motifcon" => $this->faker->text,
            "employee_id" => rand(1, 10),
            "created_at" => $this->faker->date,
            "updated_at" => $this->faker->date
        ];
    }
}

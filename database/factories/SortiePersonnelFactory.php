<?php

namespace Database\Factories;

use App\Models\SortiePersonnel;
use Illuminate\Database\Eloquent\Factories\Factory;

class SortiePersonnelFactory extends Factory
{

    /**
     * the name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = SortiePersonnel::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "sldtotsortie" => $this->faker->randomNumber,
            "sldeffsortie" => $this->faker->randomNumber,
            "sldrstsortie" => $this->faker->randomNumber,
            "debutsortie" => $this->faker->date,
            "finsortie" => $this->faker->date,
            "motifsortie" => $this->faker->word,
            "employee_id" => rand(1, 10),
            "created_at" => $this->faker->date,
            "updated_at" => $this->faker->date
        ];
    }
}

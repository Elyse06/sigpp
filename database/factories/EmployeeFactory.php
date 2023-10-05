<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{

    /**
     * the name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = Employee::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom" => $this->faker->name,
            "prenom" => $this->faker->lastName,
            "date_de_naissance" => $this->faker->date,
            "adresse" => $this->faker->address,
            "numTel" => $this->faker->phoneNumber,
            "pin" => $this->faker->randomNumber,
            "created_at" => $this->faker->date,
            "updated_at" => $this->faker->date
        ];
    }
}

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
            "nom" => $this->faker->lastName,
            "prenom" => $this->faker->firstName,
            "date_de_naissance" => $this->faker->date,
            "adresse" => $this->faker->address,
            "numTel" => $this->faker->unique()->phoneNumber,
            "pin" => $this->faker->randomNumber,
            "soldeconge" => $this->faker->randomNumber(4, false),
            "soldepermission" => $this->faker->randomNumber(4, false),
            "soldesortie" => $this->faker->unique()->randomNumber(4, false),
            "created_at" => $this->faker->date,
            "updated_at" => $this->faker->date
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{

    /**
     * the name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = Permission::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "sldtotpermi" => $this->faker->randomNumber,
            "sldeffpermi" => $this->faker->randomNumber,
            "sldrstpermi" => $this->faker->randomNumber,
            "debutpermi" => $this->faker->date,
            "finpermi" => $this->faker->date,
            "motifpermi" => $this->faker->word,
            "employee_id" => rand(1, 10),
            "created_at" => $this->faker->date,
            "updated_at" => $this->faker->date
        ];
    }
}

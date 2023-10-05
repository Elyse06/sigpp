<?php

namespace Database\Factories;

use App\Models\MissionEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;

class MissionEmployeeFactory extends Factory
{

    /**
     * the name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = MissionEmployee::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "mission_id" => rand(1, 10),
            "employee_id" => rand(1, 10)
        ];
    }
}

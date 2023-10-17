<?php

namespace Database\Factories;

use App\Models\RepoMedical;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepoMedicalFactory extends Factory
{

    /**
     * the name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = RepoMedical::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "debutrep" => $this->faker->date,
            "finrep" => $this->faker->date,
            "motifrep" => $this->faker->word,
            "employee_id" => rand(1, 10),
            "created_at" => $this->faker->date,
            "updated_at" => $this->faker->date
        ];
    }
}

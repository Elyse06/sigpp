<?php

namespace Database\Factories;

use App\Models\Mission;
use Illuminate\Database\Eloquent\Factories\Factory;

class MissionFactory extends Factory
{

    /**
     * the name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = Mission::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "lieumis" => $this->faker->city,
            "debutmis" => $this->faker->date,
            "finmis" => $this->faker->date,
            "motifmis" => $this->faker->word,
            "vehicule_id" => rand(1, 10),
            "expires_at" => $this->faker->date,
            "created_at" => $this->faker->date,
            "updated_at" => $this->faker->date
        ];
    }
}

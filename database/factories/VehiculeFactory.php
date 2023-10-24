<?php

namespace Database\Factories;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculeFactory extends Factory
{

    /**
     * the name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = Vehicule::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "marque" => array_rand(["Toyota", "Fujutsu", "Kawazaki"], 1),
            "modele" => array_rand(["Bus", "Mazda", "Mercedes", "Sprinter"], 1),
            "categorie" => array_rand(["Voiture", "Moto", "Bus"], 1),
            "plaque_immatriculation" => $this->faker->swiftBicNumber,
            "disponibilite" => rand(0, 1),
            "categorie_vehicule" => $this->faker->word,
            "probleme" => $this->faker->word,
            "kilometrage" => $this->faker->randomNumber,
            "vehiculecol" => $this->faker->word,
            "created_at" => $this->faker->date,
            "updated_at" => $this->faker->date
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\client>
 */
class clientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom_complet"=> fake()->name(),
            "sexe"=> "homme",
            "date_naissance"=> fake()->date(),
            "age"=> fake()->numberBetween(18, 70),
            "pays"=> fake()->country(),
            "ville"=> fake()->city(),
            "adresse"=> fake()->address(),
            "email"=> fake()->safeEmail(),
            "telephone"=>fake()->phoneNumber()
        ];
    }
}

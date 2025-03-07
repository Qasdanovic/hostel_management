<?php

namespace Database\Factories;

use App\Models\CapaciteChambre;
use App\Models\TarifChambre;
use App\Models\TypeChambre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chambre>
 */
class ChambreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "numero_chambre" => fake()->randomDigit(),
            "nombre_adultes_enfants_chambre" => fake()->randomDigit(),
            "renfort_chambre" => fake()->numberBetween(0,1),
            "etage_chambre" => fake()->numberBetween(0,4),
            "nbr_lits_chambre" => fake()->numberBetween(0,4),
            "image_chambre" => '',
            "tarif_chambre_id" => TarifChambre::inRandomOrder()->first()->id,
            "type_chambre_id" => TypeChambre::inRandomOrder()->first()->id,
            "capacite_chambre_id" => CapaciteChambre::inRandomOrder()->first()->id,
        ];
    }
}

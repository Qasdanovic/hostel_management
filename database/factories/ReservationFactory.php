<?php

namespace Database\Factories;

use App\Models\Chambre;
use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           "Date_heure_reservation" => now() ,
            "Date_arrivee" => fake()-> date("Y-m-d") ,
            "Date_depart" => fake()->date("Y-m-d") ,
            "Nbr_jours" => 5 ,
            "Nbr_adultes_enfants" => fake()->numberBetween(3,5) ,
            "Montant_total" => 500 ,
            "Etat" => "En cours" ,
            "client_id" => Client::inRandomOrder()->first()->id ,
            "chambre_id" => Chambre::inRandomOrder()->first()->id,
        ];
    }
}

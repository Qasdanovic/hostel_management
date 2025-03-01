<?php

use App\Models\Chambre;
use App\Models\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. 
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->dateTime("Date_heure_reservation");
            $table->date("Date_arrivee");
            $table->date("Date_depart");
            $table->integer("Nbr_jours");
            $table->integer("Nbr_adultes_enfants");
            $table->float("Montant_total");
            $table->enum("Etat", ['Planifie','En cours', 'Terminee']);
            $table->foreignIdFor(Client::class, "client_id")->constrained("clients")->cascadeOnDelete();
            $table->foreignIdFor(Chambre::class, "chambre_id")->constrained("chambres")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};

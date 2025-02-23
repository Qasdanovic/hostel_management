<?php

use App\Models\Capacite_chambre;
use App\Models\Tarif_chambre;
use App\Models\Type_chambre;
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
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->string("numero_chambre");
            $table->integer("nombre_adultes_enfants_chambre");
            $table->boolean("renfort_chambre");
            $table->integer("etage_chambre");
            $table->integer("nbr_lits_chambre");
            $table->string("image_chambre")->nullable();
            $table->foreignIdFor(Tarif_chambre::class)->constrained("tarif_chambres")->cascadeOnDelete();
            $table->foreignIdFor(Type_chambre::class)->constrained("type_chambres")->cascadeOnDelete();
            $table->foreignIdFor(Capacite_chambre::class)->constrained("capacite_chambres")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
    }
};

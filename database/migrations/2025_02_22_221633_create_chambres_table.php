<?php

use App\Models\CapaciteChambre;
use App\Models\TarifChambre;
use App\Models\TypeChambre;
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
            $table->foreignIdFor(TarifChambre::class)->constrained("tarif_chambres")->cascadeOnDelete();
            $table->foreignIdFor(TypeChambre::class)->constrained("type_chambres")->cascadeOnDelete();
            $table->foreignIdFor(CapaciteChambre::class)->constrained("capacite_chambres")->cascadeOnDelete();
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

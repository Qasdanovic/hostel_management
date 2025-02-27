<?php

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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("nom_complet");
            $table->enum("sexe", ['homme', 'femme']);
            $table->date("date_naissance");
            $table->integer("age");
            $table->string("pays");
            $table->string("ville");
            $table->string("adresse");
            $table->string("email")->unique();
            $table->string("telephone")->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

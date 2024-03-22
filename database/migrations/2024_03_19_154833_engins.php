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
        //
        Schema::create('engins', function (Blueprint $table) {
            $table->id('id_engins');
            $table->string('categorie');
            $table->string('marque');
            $table->string('modele');
            $table->string('description');
            $table->integer('compteur_heures');
            $table->string('statut');
            $table->boolean('maintenance');
            $table->dateTime('cree_le');
            $table->dateTime('mis_a_jours_le');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engins');
    }
};

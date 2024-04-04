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
        Schema::create('loc_engin', function (Blueprint $table) {
            $table->id('id_loc_engin');
            $table->foreignId('client_id')->references('id_client')->on('clients');
            $table->foreignId('id_engins')->references('id_engins')->on('engins');
            $table->string('adresse');
            $table->string('ville');
            $table->string('code_postal');
            $table->string('pays');
            $table->float('Temps_fonct');
            $table->dateTime('Louer_le');
            $table->dateTime('Rendu_le')->nullable();
        });

        Schema::create('position_engin', function (Blueprint $table) {
            $table->id('id_position');
            $table->foreignId('id_loc_engin')->references('id_loc_engin')->on('loc_engin');
            $table->string('Longitude');
            $table->string('Latitude');
            $table->dateTime('DateHeure');
        });

        Schema::create('cycle_engin', function (Blueprint $table) {
            $table->id('id_cycle');
            $table->foreignId('id_loc_engin')->references('id_loc_engin')->on('loc_engin');
            $table->dateTime('HeureMoteurON');
            $table->dateTime('HeureMoteurOFF');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loc_engin');
        Schema::dropIfExists('position_engin');
        Schema::dropIfExists('cycle_engin');
    }
};

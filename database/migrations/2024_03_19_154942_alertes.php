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
        Schema::create('alerte', function (Blueprint $table) {
            $table->id('id_alerte');
            $table->foreignId('id_engin')->references('id_engins')->on('engins');
            $table->foreignId('type_alerte')->references('id_type')->on('typealerte');
            $table->dateTime('date_alerte');
        });

        Schema::create('typealerte', function (Blueprint $table) {
            $table->id('id_typeAlerte');
            $table->string('nom_alerte');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alerte');
        Schema::dropIfExists('typealerte');
    }
};

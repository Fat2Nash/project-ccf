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
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id('id_maintenance');
            $table->foreignId('id_engin')->references('id_engins')->on('engins');
            $table->string('remarque');
            $table->string('defauts');
            $table->foreignId('id_mecaniciens')->constrained('users');
            $table->dateTime('date_maintenance');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance');
    }
};

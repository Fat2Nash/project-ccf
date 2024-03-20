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
            $table->id('id_client');
            $table->string('nom');
            $table->string('prenom');
            $table->string('mail');
            $table->string('adresse');
            $table->string('ville');
            $table->string('code_postal');
            $table->string('pays');
            $table->string('telephone');
            $table->tinyText('notes')->nullable();
            $table->dateTime('cree_le');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('clients');
    }
};

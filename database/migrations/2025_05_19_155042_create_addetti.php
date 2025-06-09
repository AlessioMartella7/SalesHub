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
        Schema::create('addetti', function (Blueprint $table) {

            //Primary Key
            $table->id();

            $table->timestamps();

            $table->integer('codice_esterno')->nullable(); //id_utente
            $table->string('ruolo', 50)->nullable();
            $table->string('nominativo', 100);
            $table->string('nome', 100)->nullable();
            $table->string('cognome', 100)->nullable();

            $table->string('email', 100)->nullable();
            $table->string('numero_centralino', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addetti');
    }
};

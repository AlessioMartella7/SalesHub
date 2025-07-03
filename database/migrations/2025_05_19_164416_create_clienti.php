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
        Schema::create('clienti', function (Blueprint $table) {

            //Primary Key
            $table->id();

            $table->timestamps();

            $table->integer('codice_esterno')->nullable(); //id_cliente
            $table->string('cliente_tipo', 255)->nullable();
            $table->string('nominativo', 255)->nullable();
            $table->string('nome', 100)->nullable();
            $table->string('cognome', 100)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('codice_fiscale', 100)->nullable();
            $table->string('piva', 100)->nullable();
            $table->string('tel1', 25)->nullable();
            $table->string('tel2', 25)->nullable();
            $table->string('tel3', 25)->nullable();
            $table->string('tel4', 25)->nullable();

            $table->string('codice_cliente_wind', 50)->nullable();
            $table->string('codice_cliente_vodafone', 50)->nullable();
            $table->string('codice_cliente_tim', 50)->nullable();
            $table->string('codice_cliente_fastweb', 50)->nullable();
            $table->string('codice_cliente_sky', 50)->nullable();

            $table->index(['codice_esterno']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clienti');
    }
};

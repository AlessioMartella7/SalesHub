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
        Schema::create('offerte_assicurazioni', function (Blueprint $table) {
            $table->id();

            //Foreign keys
            $table->foreignId('user_id')->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();

            $table->string('codice_pdv', 255);
            $table->string('codice_contratto', 255)->unique();
            $table->string('id_carrello', 255)->nullable();
            $table->string('venditore', 255)->nullable();
            $table->string('stato_contratto', 255)->nullable();
            $table->string('attivato', 255)->nullable();
            $table->string('metodo_pagamento', 255)->nullable();
            $table->date('dt_inserimento')->nullable();
            $table->date('dt_primo_pagamento')->nullable();
            $table->date('dt_cancellazione')->nullable();
            $table->string('categoria', 255)->nullable();
            $table->string('pacchetto', 255)->nullable();
            $table->string('esito_carrello', 255)->nullable();
            $table->string('causale_cancellazione', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offerte_assicurazioni');
    }
};
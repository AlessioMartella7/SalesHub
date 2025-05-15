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

        Schema::create('fissi', function (Blueprint $table) {

            //Primary Key
            $table->bigIncrements('id');

            //Foreign Key Users
            $table->foreignId('user_id')->constrained()
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->timestamps();

            $table->string('codice_contratto', 50)->unique();
            $table->string('stato', 20);
            $table->string('market_segment', 50)->nullable();
            $table->string('codice_pdv', 20);
            $table->date('dt_acquisizione');
            $table->date('dt_attivazione')->nullable();
            $table->string('offerta', 50)->nullable();
            $table->string('flag_la_lna', 5)->nullable();
            $table->string('piano_tariffario_macro', 100)->nullable();
            $table->string('modalita_pagamento', 50)->nullable();
            $table->string('tipo_ko', 50)->nullable();
            $table->string('delay_giorni', 5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fissi');
    }
};

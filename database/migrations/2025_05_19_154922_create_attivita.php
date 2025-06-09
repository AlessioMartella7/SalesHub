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
        Schema::create('attivita', function (Blueprint $table) {

            //Primary Key
            $table->id();

            //Foreign Key ragione sociale
            $table->foreignId('ragione_sociale_id')->constrained('ragioni_sociali')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();

            $table->integer('codice_esterno')->nullable(); //id_pdv
            $table->string('nominativo', 100);
            $table->string('codice_operatore_wind', 100)->nullable();
            $table->string('codice_operatore_vodafone', 100)->nullable();
            $table->string('codice_operatore_tim', 100)->nullable();
            $table->string('codice_operatore_fastweb', 100)->nullable();
            $table->string('codice_operatore_sky', 100)->nullable();

            $table->string('email', 100)->nullable();
            $table->string('tel', 100)->nullable();
            $table->string('indirizzo', 100)->nullable();
            $table->string('civico', 100)->nullable();
            $table->string('cap', 100)->nullable();
            $table->string('citta', 100)->nullable();
            $table->string('provincia', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attivita');
    }
};

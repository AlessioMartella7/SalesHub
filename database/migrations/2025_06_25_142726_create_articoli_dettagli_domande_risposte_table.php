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
        Schema::create('articoli_dettagli_domande_risposte', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('domanda_id');
            $table->unsignedBigInteger('dettaglio_id');
            $table->string('risposta')->nullable();
            $table->timestamps();

            $table->foreign('domanda_id')->references('id')->on('articoli_dettagli_domande')->onDelete('cascade');
            $table->foreign('dettaglio_id')->references('id')->on('articoli_dettagli')->onDelete('cascade');

            $table->unique(['domanda_id', 'dettaglio_id'], 'unique_domanda_dettaglio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articoli_dettagli_domande_risposte');
    }
};

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

        Schema::create('ragioni_sociali', function (Blueprint $table) {

            //Primary Key
            $table->id();

            //Foreign Key
            $table->foreignId('organizzazione_id')->constrained('organizzazioni')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();

            $table->integer('codice_esterno')->nullable(); //id_rs
            $table->string('azienda', 150);
            $table->string('partita_iva', 16);
            $table->string('codice_fiscale', 16);
            $table->string('email', 100)->nullable();
            $table->string('tel', 100)->nullable();

            $table->unique(['azienda', 'organizzazione_id'], 'unq_azienda_organizzazione');
            $table->unique(['partita_iva', 'organizzazione_id'], 'unq_piva_organizzazione');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ragioni_sociali');
    }
};

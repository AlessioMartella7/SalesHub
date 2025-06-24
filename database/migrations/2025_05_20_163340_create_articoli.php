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
        Schema::create('articoli', function (Blueprint $table) {
            //Primary Key
            $table->id();

            //Foreign Key Categorie
            $table->foreignId('vendita_id')->constrained('vendite')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            //Foreign Key Categorie
            $table->foreignId('categoria_id')->constrained('categorie')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            //Foreign Key tipologie
            $table->foreignId('tipologia_id')->constrained('tipologie')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();

            $table->string('tipo', 1);
            $table->string('codice', 50);
            $table->string('codice_ean', 50)->nullable();
            $table->string('codice_univoco', 255)->nullable();

            $table->string('voce_scontrino', 50)->nullable();
            $table->string('descrizione', 150)->nullable();
            $table->string('marca', 70)->nullable();
            $table->string('modello', 150)->nullable();

            $table->string('brand_id')->nullable();
            $table->string('costo_acquisto', 10)->nullable();
            $table->string('aliquota_acquisto', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articoli');
    }
};

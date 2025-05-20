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
            $table->bigIncrements('id');

            //Foreign Key Categorie
            $table->foreignId('categoria_id')->constrained('categorie')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            //Foreign Key tipologie
            $table->foreignId('tipologia_id')->constrained('tipologie')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->timestamps();
            $table->integer('codice_esterno')->nullable(); //id_articolo

            $table->string('tipo', 1);
            $table->string('codice', 50);
            $table->string('codice_ean', 50)->nullable();

            $table->string('voce_scontrino', 50)->nullable();
            $table->string('descrizione', 150)->nullable();
            $table->string('marca', 70)->nullable();
            $table->string('modello', 150)->nullable();
            $table->string('flg_univocita', 1);
            $table->string('id_brand', 1)->nullable();



            




            



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

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
        Schema::create('vendite', function (Blueprint $table) {

            //Primary Key
            $table->bigIncrements('id');
          
            //fk pdv 
            $table->foreignId('attivita_id')->constrained('attivita')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            //fk clienti
            $table->foreignId('cliente_id')->constrained('clienti')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
                  
            //fk addetti
            $table->foreignId('addetto_id')->constrained('addetti')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->timestamps();

            $table->integer('codice_esterno')->nullable(); //id_vendite
            $table->string('stato', 20);
            $table->string('flg_scontrino', 1); // S - scontrino F - fattura A - attestato di vendita 

            $table->string('numero_scontrino', 30)->nullable();
            $table->string('codice_lotteria', 30)->nullable();
            $table->date('data_scontrino', 30)->nullable();

            $table->date('data_vendita');
            $table->date('data_inizio');
            $table->date('data_fine');

            $table->decimal('importo_scontrino', $precision = 20, $scale = 2);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendite');
    }
};

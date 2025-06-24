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
        Schema::create('articoli_dettagli', function (Blueprint $table) {

            //Primary Key
            $table->id();

            //fk pdv
            $table->foreignId('articolo_id')->constrained('articoli')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();

            $table->string('tipologia_vendita', 255)->nullable();
            $table->string('canone', 10)->nullable();

            $table->decimal('prezzo', 20, 2)->nullable();
            $table->decimal('aliquota_prezzo', 20, 2)->nullable();
            $table->string('natura', 10)->nullable();
            $table->decimal('importo_imponibile', 20, 2)->nullable();

            $table->decimal('sconto', 20, 2)->nullable();
            $table->decimal('sconto_iva_esclusa', 20, 2)->nullable();

            $table->decimal('importo_anticipo', 20, 2)->nullable();
            $table->decimal('importo_finanziato', 20, 2)->nullable();
            $table->decimal('importo_credito', 20, 2)->nullable();
            $table->decimal('importo_ndc', 20, 2)->nullable();

            $table->decimal('importo_scontrino', 20, 2)->nullable();

            $table->string('vendita_info1', 255)->nullable();
            $table->string('vendita_info2', 255)->nullable();
            $table->string('vendita_info3', 255)->nullable();
            $table->string('vendita_info4', 255)->nullable();
            $table->string('vendita_info5', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articoli_dettagli');
    }
};
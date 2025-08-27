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
        Schema::create('offerte_energia', function (Blueprint $table) {
            $table->id();

            // Foreign Key
            $table->foreignId('user_id')->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();

            $table->string('dealer_id', 255 );
            $table->string('ragione_sociale', 255)->nullable();
            $table->string('codice_pdv', 255);
            $table->string('codice_contratto', 255);
            $table->integer('num_item_in_pdc')->nullable();
            $table->string('codice_contratto_esterno', 255);
            $table->date('dt_creazione_pdc')->nullable();
            $table->date('dt_acquisizione_pdc')->nullable();
            $table->date('dt_annullamento_pdc')->nullable();
            $table->date('dt_aggiornamento_oli')->nullable();
            $table->date('dt_annullamento_oli')->nullable();
            $table->date('dt_fine_ripensamento')->nullable();
            $table->date('dt_firma_pdc')->nullable();
            $table->date('dt_inserimento_oli')->nullable();
            $table->date('dt_attivazione')->nullable();
            $table->date('dt_cessazione')->nullable();
            $table->date('dt_decorrenza')->nullable();
            $table->string('des_categoria_uso_pdc_item', 255)->nullable();
            $table->string('des_causale_annullamento_oli', 255)->nullable();
            $table->string('des_metodo_pagamento_pdc_item', 255)->nullable();
            $table->date('dt_load')->nullable();
            $table->string('des_causale_annullamento_pdc', 255)->nullable();
            $table->string('des_nome_listino_pdc_item', 255)->nullable();
            $table->string('des_stato_oli', 255)->nullable();
            $table->string('des_tipologia_commodity', 50);
            $table->string('flg_acquisizione_pdc', 50)->nullable();
            $table->string('flg_annullamento_oli', 50)->nullable();
            $table->string('flg_annullamento_pdc', 50)->nullable();
            $table->string('flg_attivazione_asset', 50)->nullable();
            $table->string('flg_cessazione_asset', 50)->nullable();
            $table->string('flg_chiusura_oli', 50)->nullable();
            $table->string('flg_dual', 50)->nullable();
            $table->string('flg_fisso_voce_customer', 50)->nullable();
            $table->string('tipologia_prestazione', 255)->nullable();

            $table->unique(['codice_contratto', 'des_tipologia_commodity'], 'unq_cd_contr_tip_com');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offerte_energia');
    }
};
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
        Schema::create('pagamenti', function (Blueprint $table) {

            //Primary Key
            $table->id();

            //fk vendite
            $table->foreignId('vendita_id')->constrained('vendite')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();

            $table->decimal('contanti', $precision = 20, $scale = 2)->nullable();
            $table->decimal('pagamenti_elettronici', $precision = 20, $scale = 2)->nullable();
            $table->decimal('bonifici', $precision = 20, $scale = 2)->nullable();
            $table->decimal('assegni', $precision = 20, $scale = 2)->nullable();
            $table->decimal('buoni', $precision = 20, $scale = 2)->nullable();
            $table->decimal('coupon', $precision = 20, $scale = 2)->nullable();
            $table->decimal('altri_pagamenti', $precision = 20, $scale = 2)->nullable();
            $table->decimal('non_scontrinato', $precision = 20, $scale = 2)->nullable();
            $table->decimal('non_scontrinato_pos', $precision = 20, $scale = 2)->nullable();
            $table->decimal('non_riscosso', $precision = 20, $scale = 2)->nullable();

            $table->decimal('importo_conto_operatore_contanti', $precision = 20, $scale = 2);
            $table->decimal('importo_conto_operatore_pos', $precision = 20, $scale = 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamenti');
    }
};

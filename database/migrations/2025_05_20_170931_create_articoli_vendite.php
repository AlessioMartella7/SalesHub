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
        Schema::create('articoli_vendite', function (Blueprint $table) {

            $table->foreignId('articolo_id')->constrained('articoli');
            $table->foreignId('vendita_id')->constrained('vendite');
            $table->primary(['articolo_id','vendita_id']);

            $table->timestamps(); 
            
            $table->unsignedBigInteger('quantita');
            


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articoli_vendite');
    }
};

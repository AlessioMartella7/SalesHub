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
        Schema::create('addetto_attivita', function (Blueprint $table) {

            $table->foreignId('addetto_id')->constrained('addetti');
            $table->foreignId('attivita_id')->constrained('attivita');
            $table->primary(['addetto_id','attivita_id']);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addetto_attivita');
    }
};
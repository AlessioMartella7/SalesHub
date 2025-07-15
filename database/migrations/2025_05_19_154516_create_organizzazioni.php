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
        Schema::create('organizzazioni', function (Blueprint $table) {

            //Primary Key
            $table->id();

            $table->timestamps();

            $table->unsignedInteger('codice_esterno')->unique()->nullable(); // id_istanza
            $table->string('link', 255)->nullable();
            $table->string('subdir', 255)->unique()->nullable();

            $table->index(['codice_esterno']);
            $table->index(['subdir']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizzazioni');
    }
};
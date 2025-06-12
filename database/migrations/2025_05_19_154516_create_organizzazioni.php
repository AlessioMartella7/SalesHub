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

            $table->unsignedInteger('codice_esterno')->nullable(); // id_istanza
            $table->string('link', 50)->nullable();
            $table->string('subdir', 50)->nullable();
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

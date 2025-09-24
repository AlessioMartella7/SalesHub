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
        Schema::table('vendite', function (Blueprint $table) {
            $table->dateTime('data_scontrino')->nullable()->change();
            $table->dateTime('data_vendita')->change();
            $table->dateTime('data_inizio')->change();
            $table->dateTime('data_fine')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendite', function (Blueprint $table) {
            $table->date('data_scontrino')->nullable()->change();
            $table->date('data_vendita')->change();
            $table->date('data_inizio')->change();
            $table->date('data_fine')->change();
        });
    }
};
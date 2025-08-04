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
        Schema::table('users', function (Blueprint $table) {

            $table->foreignId('organizzazione_id')
                ->after('id')
                ->nullable()
                ->constrained('organizzazioni')
                ->nullOnDelete();

            $table->string('google_id')
                ->after('organizzazione_id')
                ->nullable()
                ->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['organizzazione_id']);
            $table->dropColumn('organizzazione_id');

            $table->dropUnique(['google_id']);
            $table->dropColumn('google_id');
        });
    }
};

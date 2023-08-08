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
        Schema::table('games', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('boxart_id')->after('console_id')->nullable();
            $table->foreign('boxart_id')->references('id')->on('boxarts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            //
            $table->dropForeign(['boxart_id']);
            $table->dropColumn('boxart_id');
        });
    }
};

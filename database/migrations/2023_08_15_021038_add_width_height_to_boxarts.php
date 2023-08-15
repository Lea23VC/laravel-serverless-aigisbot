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
        Schema::table('boxarts', function (Blueprint $table) {
            //
            $table->integer('width')->after('image');
            $table->integer('height')->after('width');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boxarts', function (Blueprint $table) {
            //
            $table->dropColumn('width');
            $table->dropColumn('height');
        });
    }
};

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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->string('boxart')->nullable();
            $table->date('release_date')->nullable();
            $table->string('developer')->nullable();
            $table->string('publisher')->nullable();
            $table->string('genre')->nullable();
            $table->string('players')->nullable();
            $table->boolean('availability')->default(true);
            $table->unsignedBigInteger('console_id');
            $table->foreign('console_id')->references('id')->on('consoles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};

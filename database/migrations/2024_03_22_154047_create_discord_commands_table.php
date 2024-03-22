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
        Schema::create('discord_commands', function (Blueprint $table) {
            $table->id();
            $table->string('command_id')->unique();
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('discord_application_id');
            $table->string('version');
            $table->string('default_member_permissions')->nullable();
            $table->unsignedTinyInteger('type');
            $table->string('name');
            $table->text('description');
            $table->boolean('dm_permission');
            $table->json('contexts')->nullable();
            $table->json('integration_types')->nullable();
            $table->json('options');
            $table->boolean('nsfw');
            $table->timestamps();
            $table->foreign('discord_application_id')->references('id')->on('discord_applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discord_commands');
    }
};

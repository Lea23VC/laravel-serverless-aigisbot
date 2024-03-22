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
        Schema::create('discord_applications', function (Blueprint $table) {
            $table->id();

            $table->string('discord_id')->unique();

            $table->string('name');
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->text('summary')->nullable();
            $table->boolean('is_monetized')->default(false);
            $table->boolean('bot_public')->default(false);
            $table->boolean('bot_require_code_grant')->default(false);
            $table->string('verify_key')->nullable();
            $table->bigInteger('flags')->nullable();
            $table->boolean('hook')->default(false);
            $table->json('redirect_uris')->nullable();
            $table->json('owner')->nullable();
            $table->integer('approximate_guild_count')->nullable();
            $table->json('interactions_event_types')->nullable();
            $table->integer('interactions_version')->nullable();
            $table->integer('explicit_content_filter')->nullable();
            $table->integer('rpc_application_state')->nullable();
            $table->integer('store_application_state')->nullable();
            $table->integer('verification_state')->nullable();
            $table->boolean('integration_public')->default(false);
            $table->boolean('integration_require_code_grant')->default(false);
            $table->integer('discoverability_state')->nullable();
            $table->json('discovery_eligibility_flags')->nullable();
            $table->integer('monetization_state')->nullable();
            $table->json('monetization_eligibility_flags')->nullable();
            $table->json('team')->nullable();
            $table->json('guild')->nullable();
            $table->string('interactions_endpoint_url')->nullable();
            $table->json('integration_types')->nullable();
            $table->json('integration_types_config')->nullable();
            $table->boolean('internal_guild_restriction')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discord_applications');
    }
};

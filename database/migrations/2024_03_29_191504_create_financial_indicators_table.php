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
        Schema::create('financial_indicators', function (Blueprint $table) {
            $table->id();
            $table->decimal('development_unit', 10, 2); // UF
            $table->decimal('average_value_index', 10, 2); // IVP
            $table->decimal('observed_dollar', 10, 2); // Dólar observado
            $table->decimal('agreement_dollar', 10, 2); // Dólar acuerdo
            $table->decimal('euro', 10, 2);
            $table->float('consumer_price_index', 5, 2); // IPC
            $table->decimal('monthly_tax_unit', 10, 2); // UTM
            $table->float('monthly_economic_activity_index', 5, 2); // IMACEC
            $table->float('monetary_policy_rate', 5, 2); // TPM
            $table->decimal('copper_pound', 10, 2); // Libra de Cobre
            $table->float('unemployment_rate', 5, 2); // Tasa de desempleo
            $table->decimal('bitcoin', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_indicators');
    }
};

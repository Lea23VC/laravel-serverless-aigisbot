<?php

namespace App\Console\Commands;

use App\Models\FinancialIndicator;
use App\Services\MiIndicador\MiIndicadorService;
use Illuminate\Console\Command;

class UpdateFinancialIndicators extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'financial:update';
    protected $description = 'Updates financial indicators from the API';


    /**
     * Execute the console command.
     */


    // construct using App\Services\MiIndicador\MiIndicadorService

    public function __construct(private readonly MiIndicadorService $service)
    {
        parent::__construct(); // This calls the parent class's constructor
    }


    public function handle()
    {
        //

        $data = $this->service->miIndicador()->getTodayIndicators();


        $attributes = [
            'development_unit' => $data['uf']['valor'],
            'average_value_index' => $data['ivp']['valor'],
            'observed_dollar' => $data['dolar']['valor'],
            'agreement_dollar' => $data['dolar_intercambio']['valor'],
            'euro' => $data['euro']['valor'],
            'consumer_price_index' => $data['ipc']['valor'],
            'monthly_tax_unit' => $data['utm']['valor'],
            'monthly_economic_activity_index' => $data['imacec']['valor'],
            'monetary_policy_rate' => $data['tpm']['valor'],
            'copper_pound' => $data['libra_cobre']['valor'],
            'unemployment_rate' => $data['tasa_desempleo']['valor'],
            'bitcoin' => $data['bitcoin']['valor'],
        ];

        FinancialIndicator::updateOrCreate(['id' => 1], $attributes);

        $this->info('Indicators updated successfully');
    }
}

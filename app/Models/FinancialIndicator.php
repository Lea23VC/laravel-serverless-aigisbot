<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialIndicator extends Model
{
    use HasFactory;

    protected $fillable = [
        'development_unit', 'average_value_index', 'observed_dollar',
        'agreement_dollar', 'euro', 'consumer_price_index',
        'monthly_tax_unit', 'monthly_economic_activity_index',
        'monetary_policy_rate', 'copper_pound', 'unemployment_rate',
        'bitcoin',
    ];
}

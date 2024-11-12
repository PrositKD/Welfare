<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyPayment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'monthlypayment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'apartment_id',
        'month_01', 'month_02', 'month_03', 'month_04', 'month_05', 'month_06',
        'month_07', 'month_08', 'month_09', 'month_10', 'month_11', 'month_12',
        'year',
        'type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'month_01' => 'decimal:2',
        'month_02' => 'decimal:2',
        'month_03' => 'decimal:2',
        'month_04' => 'decimal:2',
        'month_05' => 'decimal:2',
        'month_06' => 'decimal:2',
        'month_07' => 'decimal:2',
        'month_08' => 'decimal:2',
        'month_09' => 'decimal:2',
        'month_10' => 'decimal:2',
        'month_11' => 'decimal:2',
        'month_12' => 'decimal:2',
        'year' => 'integer',
    ];

    /**
     * Relationship: Assuming a MonthlyPayment belongs to an Apartment.
     * Update the relation as needed based on your application's structure.
     */
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}

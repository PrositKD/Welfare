<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['apartment_id', 'employee_id', 'amount', 'payment_date', 'status'];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class);
    }
}

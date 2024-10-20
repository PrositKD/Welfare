<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['building_id', 'apartment_number', 'owner_name', 'mobile_no', 'status'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

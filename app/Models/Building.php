<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'road', 'owner_name', 'mobile_no', 'status'];

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
}

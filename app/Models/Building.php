<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'road_id', 'contact_person', 'mobile_no', 'status'];

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
    public function road()
    {
        return $this->belongsTo(Road::class, 'road_id');
    }
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
    

}

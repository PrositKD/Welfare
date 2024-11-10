<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoadStaff extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'road_id',
    ];

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
    public function road()
    {
        return $this->belongsTo(Road::class, 'road_id');
    }
    
}

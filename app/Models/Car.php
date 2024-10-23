<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'model',
        'plate',
        'comfort_category_id',
        'employee_category_id',
    ];

    public function driver(){
        return $this->belongsTo(Driver::class);
    }
    public function comfort_category(){
        return $this->belongsTo(ComfortCategory::class);
    }
    public function bookings(){
        return $this->hasMany(CarBooking::class);
    }
}

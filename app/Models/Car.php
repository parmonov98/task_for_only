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

    public function scopeByBookings($query, $start_time, $end_time)
    {
        $query->whereDoesntHave('bookings', function ($query) use ($start_time, $end_time) {
            $query->where(function ($q) use ($start_time, $end_time) {
                $q->where('start_time', '<=', $end_time)
                    ->where('end_time', '>=', $start_time);
            });
        });
    }
}

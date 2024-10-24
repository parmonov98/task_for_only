<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBooking extends Model
{
    /** @use HasFactory<\Database\Factories\CarBookingFactory> */
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
        'car_id',
        'employee_id',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

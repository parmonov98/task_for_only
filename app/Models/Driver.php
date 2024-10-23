<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    /** @use HasFactory<\Database\Factories\DriverFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'first_name', 'last_name'
    ];

    public function car(){
        return $this->hasOne(Car::class, 'driver_id');
    }
}

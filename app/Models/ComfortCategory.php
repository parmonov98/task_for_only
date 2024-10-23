<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComfortCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ComfortCategoryFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    public function employee_positions(){
        return $this->belongsToMany(EmployeePosition::class);
    }
    public function cars(){
        return $this->belongsToMany(Car::class);
    }
}

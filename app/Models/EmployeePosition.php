<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePosition extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeePositionFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
    public function comfort_categories()
    {
        return $this->belongsToMany(ComfortCategory::class, 'position_comfort_categories', 'employee_position_id', 'comfort_category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'employee_position_id'
    ];
    public function employee_position()
    {
        return $this->belongsTo(EmployeePosition::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Position extends Model
{
    /** @use HasFactory<\Database\Factories\PositionFactory> */
    use HasFactory;

    protected $fillable = [
        'department_id',
        'title',
        'base_salary'
    ];


    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }


    public function department()

    {
        return $this->belongsTo(Department::class);
    }


}

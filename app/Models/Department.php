<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\belongsToMany;


class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    protected $fillable = [
        'manager_id',
        'department_name',
        'description'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'employee_departments', 'department_id', 'employee_id');
    }

}

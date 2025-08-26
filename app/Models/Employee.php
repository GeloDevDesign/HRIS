<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Position;
use Illuminate\Database\Eloquent\Relations\belongsTo;


class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position_id',
        'employee_number',
        'first_name',
        'last_name',
        'middle_name',
        'suffix',
        'gender',
        'civil_status',
        'nationality',
        'religion',
        'blood_type',
        'height',
        'weight',
        'date_of_birth',
        'place_of_birth',
        'address',
        'phone_number',
        'email',
        'emergency_contact_name',
        'emergency_contact_relationship',
        'emergency_contact_number',
        'sss_number',
        'philhealth_number',
        'pagibig_number',
        'tin_number',
        'hire_date',
        'employment_type',
        'employment_status',
        'photo',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}

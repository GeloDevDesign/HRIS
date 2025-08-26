<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    //

    protected static array $suffixes = ['Jr', 'II', 'III', 'IV', ''];
    protected static array $genders = ['Male', 'Female'];
    protected static array $civilStatuses = ['Single', 'Married', 'Widow'];
    protected static array $employmentTypes = ['Intern', 'Probationary' , 'Contractual', 'Part-Time','Full-Time'];
    protected static array $employmentStatus = ['Active',
        'Resigned',
        'Terminated',
        'Retired',
        'Suspended'];


    public function index(Request $request)
    {
        $query = Employee::with(['user', 'positions']);

        if ($request->filled('s')) {
            $search = trim($request->s);

            $query->where(function ($q) use ($search) {
                $q->where('employee_number', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('middle_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhereHas('positions', function ($q2) use ($search) {
                        $q2->where('title', 'like', "%{$search}%");
                    });
            });
        }

        $employees = $query->paginate($request->per_page ?? 10)
            ->withQueryString();

        $filters = [
            's' => $request->s,
            'page' => $request->page,
            'per_page' => $request->per_page
        ];

        return view('employee.index', compact('employees', 'filters'));
    }


    public function create(Request $request)
    {
        $userAccounts = User::whereDoesntHave('employee')->distinct()
            ->select('id', 'email', 'first_name', 'last_name')
            ->get();

        $positions = Position::select(['title', 'id'])->distinct()->get();

        $filters = [
            's' => $request->s,
            'page' => $request->page,
            'per_page' => $request->per_page
        ];

        return view('employee.create', [
            'filters' => $filters,
            'userAccounts' => $userAccounts ?? [],
            'suffixes' => self::$suffixes,
            'genders' => self::$genders,
            'civilStatuses' => self::$civilStatuses,
            'positions' => $positions,
            'employmentTypes' => self::$employmentTypes,
            'employmentStatus' => self::$employmentStatus
        ]);
    }


    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'position_id' => 'required|exists:positions,id',
            'employee_number' => 'required|unique:employees,employee_number',
            'first_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'last_name' => 'required|max:255',
            'suffix' => 'nullable|in:Jr,II,III,IV',
            'gender' => 'required|in:Male,Female',
            'civil_status' => 'required|in:Single,Married,Widow',
            'nationality' => 'required|max:255',
            'religion' => 'required|max:255',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'emergency_contact_name' => 'required|max:255',
            'emergency_contact_relationship' => 'required|max:255',
            'emergency_contact_number' => 'required|max:255',
            'sss_number' => 'required|max:255',
            'philhealth_number' => 'required|max:255',
            'pagibig_number' => 'required|max:255',
            'tin_number' => 'required|max:255',
            'employment_type' => 'required|in:Intern,Probationary,Regular,Contractual,Part-Time'
        ]);

        // Find the user that does NOT already have an employee record
        $user = User::whereDoesntHave('employee')
            ->where('email', $request->email)
            ->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Employee email not found or already assigned.'
            ]);
        }

        // Create employee record
        $employee = Employee::create([
            'employee_number' => $validated['employee_number'],
            'user_id' => $user->id,
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'] ?? 'None',
            'last_name' => $validated['last_name'],
            'suffix' => $validated['suffix'] ?? 'None',
            'gender' => $validated['gender'],
            'civil_status' => $validated['civil_status'],
            'nationality' => $validated['nationality'],
            'religion' => $validated['religion'],
            'height' => $validated['height'],
            'weight' => $validated['weight'],
            'date_of_birth' => Carbon::createFromFormat('m/d/Y', $validated['date_of_birth'])->format('Y-m-d'),
            'place_of_birth' => $validated['place_of_birth'],
            'address' => $validated['address'],
            'phone_number' => $validated['phone_number'],
            'emergency_contact_name' => $validated['emergency_contact_name'],
            'emergency_contact_number' => $validated['emergency_contact_number'],
            'emergency_contact_relationship' => $validated['emergency_contact_relationship'],
            'sss_number' => $validated['sss_number'],
            'philhealth_number' => $validated['philhealth_number'],
            'pagibig_number' => $validated['pagibig_number'],
            'hire_date' => Carbon::now(),
            'tin_number' => $validated['tin_number'],

        ]);


        // Attach position (assuming Employee has many-to-many relationship with Position)
        $employee->positions()->attach($validated['position_id']);

        // Redirect with success message
        return redirect()->route('employee.records.index')
            ->with('success', 'New Employee created successfully.');
    }


    public function show(Employee $record)
    {
        $record->load(['user', 'positions']);

        return view('employee.view', compact(['record']));
    }


    public function edit(Employee $record, Request $request)
    {
        $record->load(['user', 'positions']);

        $userAccounts = User::select('id', 'email', 'first_name', 'last_name')->get();
        $positions = Position::select(['title', 'id'])->get();

        return view('employee.edit', [
            'record' => $record,  // Make sure this matches your form
            'userAccounts' => $userAccounts,
            'positions' => $positions,
            'suffixes' => self::$suffixes,
            'genders' => self::$genders,
            'civilStatuses' => self::$civilStatuses,
            'employmentTypes' => self::$employmentTypes,
            'employmentStatus' => self::$employmentStatus
        ]);
    }


    public function update(Request $request, Employee $record)
    {
        // Validate the input
        $validated = $request->validate([
            'employee_number' => 'required|unique:employees,employee_number,' . $record->id,
            'first_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'last_name' => 'required|max:255',
            'suffix' => 'nullable|in:Jr,II,III,IV',
            'gender' => 'required|in:Male,Female',
            'civil_status' => 'required|in:Single,Married,Widow',
            'nationality' => 'required|max:255',
            'religion' => 'required|max:255',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'emergency_contact_name' => 'required|max:255',
            'emergency_contact_relationship' => 'required|max:255',
            'emergency_contact_number' => 'required|max:255',
            'sss_number' => 'required|max:255',
            'philhealth_number' => 'required|max:255',
            'pagibig_number' => 'required|max:255',
            'tin_number' => 'required|max:255',
            'employment_type' => 'required|in:Intern,Probationary,Regular,Contractual,Part-Time',
            'position_id' => 'required|exists:positions,id',
        ]);

        // Update the employee record
        $record->update([
            'employee_number' => $validated['employee_number'],
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'] ?? null,
            'last_name' => $validated['last_name'],
            'suffix' => $validated['suffix'] ?? null,
            'gender' => $validated['gender'],
            'civil_status' => $validated['civil_status'],
            'nationality' => $validated['nationality'],
            'religion' => $validated['religion'],
            'height' => $validated['height'],
            'weight' => $validated['weight'],
            'date_of_birth' => $validated['date_of_birth'],
            'place_of_birth' => $validated['place_of_birth'],
            'address' => $validated['address'],
            'phone_number' => $validated['phone_number'],
            'emergency_contact_name' => $validated['emergency_contact_name'],
            'emergency_contact_relationship' => $validated['emergency_contact_relationship'],
            'emergency_contact_number' => $validated['emergency_contact_number'],
            'sss_number' => $validated['sss_number'],
            'philhealth_number' => $validated['philhealth_number'],
            'pagibig_number' => $validated['pagibig_number'],
            'tin_number' => $validated['tin_number'],
            'employment_type' => $validated['employment_type'],
            'employment_status' => $validated['employment_status']
        ]);

        // Update position relationship
        $record->positions()->sync([$validated['position_id']]);

        // Redirect with success message
        return redirect()->route('employee.records.index')
            ->with('success', 'Employee updated successfully.');
    }


}

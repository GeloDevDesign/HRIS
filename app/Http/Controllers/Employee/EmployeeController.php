<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index(Request $request)
    {

        $employees = Employee::with(['user', 'position'])->get()->toArray();

//        dd($employees);

        $employees = Employee::with(['user', 'position'])->paginate($request->per_page ?? 10);

        $filters = [
            's' => $request->s,
            'page' => $request->page,
            'per_page' => $request->per_page
        ];

        return view('employee.index', compact('employees', 'filters'));
    }

    public function create(Request $request)
    {

        $filters = [
            's' => $request->s,
            'page' => $request->page,
            'per_page' => $request->per_page
        ];

        return view('employee.create', compact('filters'));
    }


    public function store()
    {

    }

    public function show()
    {

    }


}

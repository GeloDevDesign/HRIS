<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;



class DepartmentController extends Controller
{
    //

    public function index(Request $request)
    {
        // Fetch the departments with users
        $departments = Department::with('users')->get();

        $filters = [];

        return view('organization.department.index', compact('departments', 'filters'));
    }


    public function create(Request $request)
    {

        return view('organization.department.create');
    }

    public function store(Request $request)
    {

    }


    public function show(Department $department)
    {

    }

    public function edit(Department $department)
    {

    }
}

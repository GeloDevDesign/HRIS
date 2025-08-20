<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Benefit;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $benefits = [];
        $filters = [];
        return view('employee.index', compact('benefits', 'filters'));
    }

    public function create()
    {

    }


    public function store()
    {

    }

    public function show()
    {

    }


}

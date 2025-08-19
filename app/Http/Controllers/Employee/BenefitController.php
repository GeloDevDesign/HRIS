<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    //

    public function index(Request $request)
    {

        $benefits = [];
        $filters = [
            's' => $request->s,
            'page' => $request->page,
            'per_page' => $request->per_page
        ];

        return view('employee.benefits.index', compact('benefits', 'filters'));
    }


    public function create(Request $request)
    {

        $benefits = [];
        $filters = [
            's' => $request->s,
            'page' => $request->page,
            'per_page' => $request->per_page
        ];

        return view('employee.benefits.create', compact('benefits', 'filters'));
    }


    public function store(Request $request)
    {

    }
}

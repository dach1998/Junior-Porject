<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employee.index', compact('employees'));
    }


    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone_number' => 'required|numeric|digits:11|unique:employees,phone_number',
        ]);
        Employee::create($data);
        return redirect()->route('employee.index');
    }
}

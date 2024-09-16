<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Отображение всех сотрудников
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }


}

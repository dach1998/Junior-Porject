<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Отображает список всех сотрудников с постраничной навигацией.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employee.index', compact('employees'));
    }

    /**
     * Возвращает представление для создания нового сотрудника.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Создает нового сотрудника на основе валидных данных из запроса.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route('employee.index');
    }

    /**
     * Возвращает представление для редактирования данных существующего сотрудника.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\View\View
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Обновляет данные существующего сотрудника на основе валидных данных из запроса.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employee.index');
    }

    /**
     * Удаляет существующего сотрудника.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}

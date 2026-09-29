<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
{
    $search = $request->query('search');

    $employees = Employee::when($search, function ($query, $search) {
        return $query->where('name', 'like', '%' . $search );
    })->get();

    return view('employees.index', compact('employees', 'search'));
}

    public function create()
    {
        $departements = Departement::all();
        return view('employees.create', compact('departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:employees,email',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
            'position' => 'required|string',
        ]);
        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        //
    }

    public function edit(Employee $employee)
    {
        $departements = Departement::all();
        return view('employees.edit', compact('employee', 'departements'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
            'position' => 'required|string',
            'departement_id' => 'required|string'
        ]);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
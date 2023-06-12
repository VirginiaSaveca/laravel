<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->limit(200)->get();
        return view('employees.index', ['employees' => $employees]);
    }

    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', ['employee' => $employee]);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function update(Request $request, string $id)
    {

        $validated = $request->validate(
            [
                'first_name' => ['required', 'string', 'min:3'],
                'last_name' => ['required', 'string', 'min:3'],
                'email' => ['required', 'email', Rule::unique(Employee::class, 'email')->ignore($id)],
                'phone_number' => ['required', 'string'],
                'date_of_birth' => ['required', 'date'],
                'phone_number' => ['required', 'string'],
                'gender' => ['required', 'string', Rule::in(['male', 'female', 'other'])],
                'address' => ['required', 'string'],
                'salary' => ['required', 'numeric'],
                'type_employee' => ['string', 'numeric'],
                'nuit' => ['required', 'numeric'],
            ]
        );
        $employee = Employee::findOrFail($id);

        $employee->update($validated);
        return redirect()->route('employees.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'first_name' => ['required', 'string', 'min:3'],
                'last_name' => ['required', 'string', 'min:3'],
                'email' => ['required', 'email', Rule::unique(Employee::class, 'email')],
                'phone_number' => ['required', 'string'],
                'date_of_birth' => ['required', 'date'],
                'phone_number' => ['required', 'string'],
                'gender' => ['required', 'string', Rule::in(['male', 'female', 'other'])],
                'address' => ['required', 'string'],
                'salary' => ['required', 'numeric'],
                'type_employee' => ['string', 'numeric'],
                'nuit' => ['required', 'numeric'],


            ]
        );
        $employee = new Employee($validated);
        $employee->save();
        return redirect()->route('employees.index');
    }

    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::withCount(['users'])->latest()->paginate(10);
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:departments,code',
            'name' => 'required|string',
        ]);

        $department = new Department($validated);
        // $department->created_by = auth()->id(); // Ready for auth
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function show(Department $department)
    {
        $department->load(['users']);
        return view('departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:departments,code,' . $department->id,
            'name' => 'required|string',
        ]);

        $department->fill($validated);
        // $department->updated_by = auth()->id(); // Ready for auth
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        if ($department->users()->exists()) {
            return back()->with('error', 'Cannot delete department with associated users.');
        }
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}

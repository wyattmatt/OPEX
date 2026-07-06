<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['departmentModel', 'roleModel'])->latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $departments = Department::all();
        $roles = \App\Models\Role::all();
        return view('users.create', compact('departments', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,id',
            'department' => 'nullable|exists:departments,id',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        
        $user = new User($validated);
        $user->created_by = auth()->id();
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        $user->load(['departmentModel', 'roleModel']);
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $departments = Department::all();
        $roles = \App\Models\Role::all();
        return view('users.edit', compact('user', 'departments', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|exists:roles,id',
            'department' => 'nullable|exists:departments,id',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->fill($validated);
        $user->modified_by = auth()->id();
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}

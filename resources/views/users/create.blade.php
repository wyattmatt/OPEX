@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-8 col-12">
            <!-- Page header -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Add User</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <div>
        <form action="{{ route('users.store') }}" method="POST" class="row g-6 justify-content-center">
            @csrf
            <div class="col-xl-6 col-md-8 col-12">
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card mb-6 card-lg">
                    <div class="card-body px-6 py-5">
                        <div class="row g-4">
                             <!-- Name -->
                             <div class="col-12">
                                 <label for="name" class="form-label">Full Name</label>
                                 <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="e.g. John Doe" value="{{ old('name') }}" required />
                                 @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                             </div>
                             <!-- Email -->
                             <div class="col-12">
                                 <label for="email" class="form-label">Email</label>
                                 <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="e.g. john@example.com" value="{{ old('email') }}" required />
                                 @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                             </div>
                             <!-- Password -->
                             <div class="col-12">
                                 <label for="password" class="form-label">Password</label>
                                 <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required />
                                 @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                             </div>
                             <!-- Password Confirmation -->
                             <div class="col-12">
                                 <label for="password_confirmation" class="form-label">Confirm Password</label>
                                 <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required />
                             </div>
                             <!-- Role -->
                             <div class="col-12">
                                 <label for="role" class="form-label">Role</label>
                                 <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                                     <option value="" disabled selected>Select Role</option>
                                     @foreach($roles as $role)
                                         <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                     @endforeach
                                 </select>
                                 @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                             </div>
                             <!-- Department -->
                             <div class="col-12">
                                 <label for="department" class="form-label">Department</label>
                                 <select name="department" id="department" class="form-select @error('department') is-invalid @enderror">
                                     <option value="" disabled selected>Select Department</option>
                                     @foreach($departments as $dept)
                                         <option value="{{ $dept->id }}" {{ old('department') == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                                     @endforeach
                                 </select>
                                 @error('department')<div class="invalid-feedback">{{ $message }}</div>@enderror
                             </div>
                        </div>
                    </div>
                </div>

                <!-- button -->
                <div>
                    <button type="submit" class="btn btn-primary">Create User</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

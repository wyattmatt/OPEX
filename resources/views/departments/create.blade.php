@extends('layouts.app')

@section('title', 'Add Department')

@section('content')
<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-8 col-12">
            <!-- Page header -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Add Department</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">Departments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <div>
        <form action="{{ route('departments.store') }}" method="POST" class="row g-6 justify-content-center">
            @csrf
            <div class="col-xl-6 col-md-8 col-12">
                <div class="card mb-6 card-lg">
                    <div class="card-body px-6 py-5">
                        <div class="row g-4">
                            <!-- Code -->
                            <div class="col-12">
                                <label for="code" class="form-label">Department Code</label>
                                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="e.g. IT" value="{{ old('code') }}" required />
                                @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <!-- Name -->
                            <div class="col-12">
                                <label for="name" class="form-label">Department Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="e.g. Information Technology" value="{{ old('name') }}" required />
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- button -->
                <div>
                    <button type="submit" class="btn btn-primary">Create Department</button>
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

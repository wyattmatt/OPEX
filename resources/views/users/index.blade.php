@extends('layouts.app')

@section('title', 'Users List')

@section('content')
<div class="custom-container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Users</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Operator</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('users.create') }}" class="btn btn-dark"> Add New User</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Validation Errors / Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div>
        <div class="row">
            <div class="col-12">
                <!-- card -->
                <div class="card card-lg">
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 table-centered table-hover">
                            <thead class="sticky-top">
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <h5 class="mb-0">
                                                    <a href="#!" class="text-inherit">{{ $user->name }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{ $user->roleModel ? $user->roleModel->name : 'N/A' }}
                                        </span>
                                    </td>
                                    <td>{{ $user->departmentModel ? $user->departmentModel->name : 'N/A' }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-icon btn-sm btn-light rounded-circle" title="Edit">
                                                <i class="ti ti-edit fs-5"></i>
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon btn-sm btn-light text-danger rounded-circle" title="Delete">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No users found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-top border-dashed d-flex justify-content-between align-items-center">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

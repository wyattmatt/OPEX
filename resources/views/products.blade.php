@extends('layouts.app')

@section('title', 'Products List')

@section('content')
<div class="custom-container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Products</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Stock</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product List</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('products.create') }}" class="btn btn-dark"> Add New Product</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Validation Errors / Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <div class="row">
            <div class="col-12">
                <!-- card -->
                <div class="card card-lg">
                    <div class="card-header border-bottom-0">
                        <form action="{{ route('products.index') }}" method="GET">
                            <div class="row gx-2">
                                <div class="col-lg-4 col-md-6 mt-3 mt-md-0">
                                    <label class="form-label mb-0 visually-hidden">Status</label>
                                    <select name="status" class="form-select" onchange="this.form.submit()">
                                        <option value="">All Statuses</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}" {{ request('status') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-3 mt-md-0">
                                    <label class="form-label mb-0 visually-hidden">Type</label>
                                    <select name="type" class="form-select" onchange="this.form.submit()">
                                        <option value="">All Types</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 table-centered table-hover">
                            <thead class="sticky-top">
                                <tr>
                                    <th>Barcode</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Room</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}">{{ $product->barcode }}</a>
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @php
                                            $statusName = $product->statusModel ? $product->statusModel->name : 'N/A';
                                            $statusCode = $product->statusModel ? $product->statusModel->code : '';
                                            $badgeClass = match($statusCode) {
                                                'AVL' => 'bg-success',
                                                'USE' => 'bg-info',
                                                'RPR' => 'bg-warning',
                                                'BRK' => 'bg-danger',
                                                default => 'bg-secondary',
                                            };
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">{{ $statusName }}</span>
                                    </td>
                                    <td>{{ $product->typeModel ? $product->typeModel->name : 'N/A' }}</td>
                                    <td>{{ $product->roomModel ? $product->roomModel->name . ' (' . $product->roomModel->code . ')' : 'N/A' }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-icon btn-sm btn-light rounded-circle" title="Edit/View QR">
                                                <i class="ti ti-edit fs-5"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" class="m-0">
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
                                    <td colspan="7" class="text-center">No products found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-top border-dashed d-flex justify-content-between align-items-center">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

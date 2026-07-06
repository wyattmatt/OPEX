@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-12 col-12">
            <!-- Page header -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Edit Product</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Stock</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a class='btn btn-dark' href='{{ route('products.index') }}'> Back to Products</a>
                </div>
            </div>
        </div>
    </div>
    
    <div>
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="row g-6 justify-content-center">
            @csrf
            @method('PUT')
            <div class="col-xl-8 col-12">
                
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
                    <div class="card-header border-bottom border-dashed d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3">
                        <div>
                            <h5>Asset Details</h5>
                            <p class="mb-0 text-secondary" style="word-break: break-all;">ID: {{ $product->id }}</p>
                        </div>
                        <div class="text-start text-sm-end">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data={{ urlencode($product->barcode) }}" alt="QR Code" class="img-thumbnail bg-white p-1">
                            <p class="small mt-1 mb-0 fw-bold text-center text-sm-end">{{ $product->barcode }}</p>
                        </div>
                    </div>
                    <div class="card-body px-6 py-5">
                        <div class="row g-4">
                            <!-- Barcode -->
                            <div class="col-lg-6">
                                <label for="barcode" class="form-label">Barcode</label>
                                <input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror" id="barcode" placeholder="e.g. OPxxx00123" value="{{ old('barcode', $product->barcode) }}" required />
                                @error('barcode')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <!-- Item Name -->
                            <div class="col-lg-6">
                                <label for="name" class="form-label">Item Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="e.g. Dell XPS 15" value="{{ old('name', $product->name) }}" required />
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            
                            <!-- Status -->
                            <div class="col-lg-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="" disabled>Select Status</option>
                                    @foreach($statuses as $stat)
                                        <option value="{{ $stat->id }}" {{ old('status', $product->status) == $stat->id ? 'selected' : '' }}>{{ $stat->name }}</option>
                                    @endforeach
                                </select>
                                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <!-- Type -->
                            <div class="col-lg-6">
                                <label for="type" class="form-label">Type</label>
                                <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                                    <option value="" disabled>Select Type</option>
                                    @foreach($types as $t)
                                        <option value="{{ $t->id }}" {{ old('type', $product->type) == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                                    @endforeach
                                </select>
                                @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            
                            <!-- Room -->
                            <div class="col-lg-6">
                                <label for="room" class="form-label">Room / Location</label>
                                <select name="room" id="room" class="form-select @error('room') is-invalid @enderror" required>
                                    <option value="" disabled>Select Room</option>
                                    @foreach($rooms as $rm)
                                        <option value="{{ $rm->id }}" {{ old('room', $product->room) == $rm->id ? 'selected' : '' }}>{{ $rm->name }} ({{ $rm->code }})</option>
                                    @endforeach
                                </select>
                                @error('room')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <!-- Notes -->
                            <div class="col-12">
                                <label for="noted" class="form-label">Notes (Optional)</label>
                                <textarea name="noted" id="noted" class="form-control @error('noted') is-invalid @enderror" rows="4" placeholder="Additional details...">{{ old('noted', $product->noted) }}</textarea>
                                @error('noted')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    <div class="card-footer border-top border-dashed d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                        <div class="text-secondary small d-flex flex-column gap-1">
                            <span><strong>Created By:</strong> {{ $product->createdBy ? $product->createdBy->name : 'System' }} at {{ $product->created_at ? $product->created_at->format('d M, Y H:i') : 'N/A' }}</span>
                            <span><strong>Last Updated:</strong> {{ $product->modifiedBy ? $product->modifiedBy->name : 'System' }} at {{ $product->updated_at ? $product->updated_at->format('d M, Y H:i') : 'N/A' }}</span>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 w-md-auto">Update Product</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

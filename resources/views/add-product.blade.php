@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="custom-container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-md-12 col-12">
            <!-- Page header -->
            <div class="mb-8 d-md-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-3 h2">Add Product</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Stock</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
        <form action="{{ route('products.store') }}" method="POST" class="row g-6 justify-content-center">
            @csrf
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
                    <div class="card-header border-bottom border-dashed">
                        <h5>Asset Details</h5>
                        <p class="mb-0 text-secondary">Information about the inventory item.</p>
                    </div>
                    <div class="card-body px-6 py-5">
                        <div class="row g-4">
                            <!-- Barcode -->
                            <div class="col-lg-6">
                                <label for="barcode" class="form-label">Barcode</label>
                                <input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror" id="barcode" placeholder="e.g. OPxxx00123" value="{{ old('barcode') }}" required />
                                @error('barcode')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <!-- Item Name -->
                            <div class="col-lg-6">
                                <label for="name" class="form-label">Item Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="e.g. Dell XPS 15" value="{{ old('name') }}" required />
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            
                            <!-- Status -->
                            <div class="col-lg-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select Status</option>
                                    @foreach($statuses as $stat)
                                        <option value="{{ $stat->id }}" {{ old('status') == $stat->id ? 'selected' : '' }}>{{ $stat->name }}</option>
                                    @endforeach
                                </select>
                                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <!-- Type -->
                            <div class="col-lg-6">
                                <label for="type" class="form-label">Type</label>
                                <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select Type</option>
                                    @foreach($types as $t)
                                        <option value="{{ $t->id }}" {{ old('type') == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                                    @endforeach
                                </select>
                                @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            
                            <!-- Room -->
                            <div class="col-lg-6">
                                <label for="room" class="form-label">Room / Location</label>
                                <select name="room" id="room" class="form-select @error('room') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select Room</option>
                                    @foreach($rooms as $rm)
                                        <option value="{{ $rm->id }}" {{ old('room') == $rm->id ? 'selected' : '' }}>{{ $rm->name }} ({{ $rm->code }})</option>
                                    @endforeach
                                </select>
                                @error('room')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <!-- Notes -->
                            <div class="col-12">
                                <label for="noted" class="form-label">Notes (Optional)</label>
                                <textarea name="noted" id="noted" class="form-control @error('noted') is-invalid @enderror" rows="4" placeholder="Additional details...">{{ old('noted') }}</textarea>
                                @error('noted')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- button -->
                <div>
                    <button type="submit" class="btn btn-primary">Create Product</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

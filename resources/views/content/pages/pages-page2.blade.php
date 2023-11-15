@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Page 2')

@section('content')
<!-- Add this form below the existing code -->
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-body" style="background-color: #ffffff;">
                <!-- Light blue background for card body -->
                <h5 class="card-title text-center">Add Product</h5>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form method="POST" action="{{ route('store') }}">
                    @csrf
                    <!-- Input for Product Name -->
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" id="productName"
                            placeholder="Enter product name">

                        @error('name')
                        <div class="text-danger">{{$message}}</div> @enderror
                    </div>

                    <!-- Input for Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" id="price"
                            placeholder="Enter product price">
                        @error('price')
                        <div class="text-danger">{{$message}}</div> @enderror
                    </div>

                    <!-- Input for Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Enter product description"
                            name="description"></textarea>
                        @error('description')
                        <div class="text-danger">{{$message}}</div> @enderror
                    </div>

                    <!-- Input for Stock Quantity -->
                    <div class="mb-3">
                        <label for="stockQuantity" class="form-label">Stock Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="stockQuantity"
                            placeholder="Enter stock quantity">
                        @error('quantity')
                        <div class="text-danger">{{$message}}</div> @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-block"
                        style="background-color: #a4c2f4; border-color: #a4c2f4; color: #ffffff;">Add
                        Product</button>
                    <!-- Green button with dark green border -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
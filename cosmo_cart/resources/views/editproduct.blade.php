@extends('layouts.template')
@section('page_title')
Edit Products - Cosmo Cart
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4" style="color: #ffffff;"><span class="text-muted fw-light">Page/</span> Edit Product</h4>

    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4" style="background-color: #343a40; color: #ffffff;">
            <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #495057; color: #ffffff;">
                <h5 class="mb-0">Edit Product</h5>
                <small class="text-muted float-end">Input Information</small>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger" role="alert" style="color: #ffffff;">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('updateproduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="product_name" style="color: #ffffff;">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="price" style="color: #ffffff;">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="count" style="color: #ffffff;">Product Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="count" name="count" value="{{ $product->count }}" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="short_description" style="color: #ffffff;">Short Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="10" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;">{{ $product->short_description }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="long_description" style="color: #ffffff;">Long Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="long_description" id="long_description" cols="30" rows="10" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;">{{ $product->long_description }}</textarea>
                        </div>
                    </div>
              
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" style="background-color: #007bff; border: none; color: #ffffff;">Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

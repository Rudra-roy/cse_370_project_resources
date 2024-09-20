@extends('layouts.template')
@section('page_title')
Edit Product Image - Cosmo Cart
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4" style="color: #ffffff;"><span class="text-muted fw-light">Page/</span> Edit Product Image</h4>

    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4" style="background-color: #343a40; color: #ffffff;">
            <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #495057; color: #ffffff;">
                <h5 class="mb-0">Edit Product Image</h5>
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
                <form action="{{ route('updateproductimage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name" style="color: #ffffff;">Previous Image</label>
                        <div class="col-sm-10">
                            <img src="{{ asset($product->product_image) }}" alt="" height="100">
                        </div>
                    </div>

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name" style="color: #ffffff;">Upload New Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="product_image" name="product_image" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;" />
                        </div>
                    </div>
          
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" style="background-color: #007bff; border: none; color: #ffffff;">Update Product Image</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

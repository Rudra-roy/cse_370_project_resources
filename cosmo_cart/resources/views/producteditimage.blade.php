@extends('layouts.template')
@section('page_title')
Edit Product image - Cosmo Cart
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Product image</h4>

    <!-- Basic Layout & Basic with Icons -->
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Product image</h5>
            <small class="text-muted float-end">Input Information</small>
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form action="{{route('updateproductimage')}}" method="POST", enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Previous image</label>
                    <div class="col-sm-10">
                        <img src="{{ asset($product->product_image) }}" alt="" height="100">
                    </div>
                </div>

                <input type="hidden" name="product_id" value="{{$product->id}}">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Upload New image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="product_image" name="product_image" />
                    </div>
                </div>
          
                  <div class="row justify-content-end">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Update product image</button>
                    </div>
                  </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

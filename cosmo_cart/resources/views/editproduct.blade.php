@extends('layouts.template')
@section('page_title')
Edit Products - Cosmo Cart
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Product</h4>

    <!-- Basic Layout & Basic with Icons -->
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Product</h5>
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
            <form action="{{ route("updateproduct") }}" method="POST", enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="product_id" value="{{$product->id}}">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="product_name" name="product_name" value="{{$product->product_name}}" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="count" name="count" value="{{$product->count}}"  />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Short Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="10" value="{{$product->short_description}}" ></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Long Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="long_description" id="long_description" cols="30" rows="10" value="{{$product->long_description}}" ></textarea>
                </div>
              </div>
          
              <div class="row justify-content-end">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@extends('layouts.template')
@section('page_title')
Add Products - Cosmo Cart
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Product</h4>

    <!-- Basic Layout & Basic with Icons -->
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New Product</h5>
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
            <form action="{{route('storeproduct')}}" method="POST", enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Laptop" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="price" name="price" placeholder="100" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="count" name="count" placeholder="100" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Short Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="10"></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Long Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="long_description" id="long_description" cols="30" rows="10"></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                <div class="col-sm-10">
                    <label for="exampleFormControlSelect1" class="form-label">category</label>
                    <select class="form-select" id="product_category_id" name='product_category_id' aria-label="Default select example">
                      <option selected>Select product category</option>
                      @foreach ($categories as $category)

                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                      @endforeach
                    </select>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category</label>
                  <div class="col-sm-10">
                      <label for="exampleFormControlSelect1" class="form-label">Sub category</label>
                      <select class="form-select" id="product_subcategory_id" name='product_subcategory_id' aria-label="Default select example">
                        <option selected>Select product subcategory</option>
                        @foreach ($subcategories as $subcategory)
                          <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>                  
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="product_image" name="product_image" />
                    </div>
                  </div>
          
                  <div class="row justify-content-end">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                  </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

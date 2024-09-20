@extends('layouts.template')
@section('page_title')
Add Products - Cosmo Cart
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4" style="color: #ffffff;"><span class="text-muted fw-light">Page/</span> Add Product</h4>

    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4" style="background-color: #343a40; color: #ffffff;">
            <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #495057; color: #ffffff;">
                <h5 class="mb-0" style="color: #ffffff;">Add New Product</h5>
                <small class="text-muted float-end">Input Information</small>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('storeproduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="product_name" style="color: #ffffff;">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Laptop" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="price" style="color: #ffffff;">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" name="price" placeholder="100" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="count" style="color: #ffffff;">Product Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="count" name="count" placeholder="100" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="short_description" style="color: #ffffff;">Short Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="10" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="long_description" style="color: #ffffff;">Long Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="long_description" id="long_description" cols="30" rows="10" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="product_category_id" style="color: #ffffff;">Select Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="product_category_id" name='product_category_id' aria-label="Default select example" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;">
                                <option selected>Select product category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="product_subcategory_id" style="color: #ffffff;">Select Sub Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="product_subcategory_id" name='product_subcategory_id' aria-label="Default select example" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;">
                                <option selected>Select product subcategory</option>
                                @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                  

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="product_image" style="color: #ffffff;">Upload Product Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="product_image" name="product_image" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;" />
                        </div>
                    </div>
          
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success" style="background-color: #28a745; border: none; color: #ffffff;">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

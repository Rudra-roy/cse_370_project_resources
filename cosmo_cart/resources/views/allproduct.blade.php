@extends('layouts.template')
@section('page_title')
All Products - Cosmo Cart 
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Products</h4>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>

        @endif  
        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">Available Product Information</h5>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($products as $product)
                  <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>
                            <img src="{{ asset($product->product_image) }}" alt="" height="100">
                            <br>
                            <a href="{{route('producteditimage', $product->id)}}" class="btn btn-primary">Update image</a>
                        </td>
                        <td>{{$product->price}}</td>
                        <td>
                            <a href="{{route('editproduct', $product->id)}}" class='btn btn-primary'>Edit</a>
                            <a href="{{route('deleteproduct', $product->id)}}" class='btn btn-warning'>Delete</a>
                        </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
@endsection

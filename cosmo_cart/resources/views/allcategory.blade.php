@extends('layouts.template')
@section('page_title')
All Categories - Cosmo Cart   
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4" style="color: #ffffff;"><span class="text-muted fw-light">Page/</span> All Categories</h4>

    <!-- Hoverable Table rows -->
    <div class="card" style="background-color: #343a40; color: #ffffff;">
        <h5 class="card-header" style="background-color: #495057; color: #ffffff;">Available Category Information</h5>
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="table-responsive text-nowrap">
            <table class="table table-hover" style="color: #ffffff;">
                <thead>
                    <tr style="color: #ffffff;">
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Sub Category Count</th>
                        <th>Product Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->subcategory_count }}</td>
                        <td>{{ $category->product_count }}</td>
                        <td>
                            <a href="{{ route('editcategory', $category->id) }}" class='btn btn-primary' style="color: #ffffff;">Edit</a>
                            <a href="{{ route('deletecategory', $category->id) }}" class='btn btn-warning' style="color: #ffffff;">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Hoverable Table rows -->
</div>
@endsection

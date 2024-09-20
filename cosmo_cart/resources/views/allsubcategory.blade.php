@extends('layouts.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4" style="color: #ffffff;"><span class="text-muted fw-light">Page/</span> All Sub Categories</h4>

    <!-- Hoverable Table rows -->
    <div class="card" style="background-color: #343a40; color: #ffffff;">
        <h5 class="card-header" style="background-color: #495057; color: #ffffff;">Available Sub Category Information</h5>
        
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert" style="color: #ffffff;">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="table-responsive text-nowrap">
            <table class="table table-hover" style="color: #ffffff;">
                <thead>
                    <tr style="color: #ffffff;">
                        <th>ID</th>
                        <th>Sub Category Name</th>
                        <th>Category</th>
                        <th>Product Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($allsubcategories as $subcategory)
                    <tr>
                        <td>{{ $subcategory->id }}</td>
                        <td>{{ $subcategory->subcategory_name }}</td>
                        <td>{{ $subcategory->category_name }}</td>
                        <td>{{ $subcategory->subcategory_product_count }}</td>
                        <td>
                            <a href="{{ route('editsubcategory', $subcategory->id) }}" class='btn btn-primary' style="color: #ffffff;">Edit</a>
                            <a href="{{ route('deletesubcategory', $subcategory->id) }}" class='btn btn-warning' style="color: #ffffff;">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

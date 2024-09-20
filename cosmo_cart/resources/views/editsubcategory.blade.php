@extends('layouts.template')
@section('page_title')
Edit Sub Category - Cosmo Cart   
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4" style="color: #ffffff;"><span class="text-muted fw-light">Page/</span> Edit Sub Category</h4>

    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4" style="background-color: #343a40; color: #ffffff;">
            <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #495057; color: #ffffff;">
                <h5 class="mb-0">Edit Sub Category</h5>
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
                <form action="{{ route('updatesubcategory') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $subcategory->id }}" name="subcategory_id">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="subcategory_name" style="color: #ffffff;">Sub Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" value="{{ $subcategory->subcategory_name }}" style="background-color: #495057; color: #ffffff; border: 1px solid #ffffff;" />
                        </div>
                    </div>
                    
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" style="background-color: #007bff; border: none; color: #ffffff;">Update Sub Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

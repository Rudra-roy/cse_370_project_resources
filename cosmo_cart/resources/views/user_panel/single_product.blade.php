@extends('user_panel.layouts.template')
@section('main-content')
{{-- <div class="container my-5">
    <div class="row g-4">
        <!-- Product Image Section -->
        <div class="col-lg-4">
            <div class="box_main shadow-sm p-3 mb-5 bg-white rounded">
                <div class="tshirt_img text-center">
                    <img src="" class="img-fluid rounded" alt="">
                </div>
            </div>
        </div>

        <!-- Product Info Section -->
        <div class="col-lg-8">
            <div class="box_main shadow-sm p-4 mb-5 bg-white rounded">
                <!-- Product Title and Price -->
                <div class="product-info d-flex justify-content-between align-items-center mb-3">
                    <h4 class="product_name mb-0">T-shirt</h4>
                    <p class="price_text mb-0">Price: <span class="fw-bold text-primary">$30</span></p>
                </div>

                <!-- Short Description -->
                <p class="text-muted mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam voluptatum aspernatur minus sunt consequatur quos!</p>

                <!-- Long Description -->
                <div class="product-details mb-4">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam optio dolor provident vel, eum error iusto incidunt illum debitis et mollitia expedita sit saepe quod eius ratione dolorem obcaecati impedit? Ratione quis minus vel corporis non est optio mollitia totam.</p>
                </div>

                <!-- Additional Product Info -->
                <ul class="list-group mb-4">
                    <li class="list-group-item">Category:</li>
                    <li class="list-group-item">Subcategory:</li>
                    <li class="list-group-item">Available Quantity:</li>
                </ul>

                <!-- Rating Section -->
                <div class="d-flex align-items-center mb-3">
                    <p class="mb-0 me-3">Rating:</p>
                    <button class="btn btn-outline-primary btn-sm">Give a Rating</button>
                </div>

                <!-- Buy Now and See More Buttons -->
                <div class="d-flex">
                    <a href="#" class="btn btn-primary me-2">Buy Now</a>
                    <a href="#" class="btn btn-outline-secondary">See More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .box_main {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 15px;
    }
    .product_name {
        font-size: 1.5rem;
        font-weight: 600;
    }
    .price_text span {
        color: #007bff;
    }
    .product-details {
        font-size: 1rem;
        line-height: 1.6;
    }
    .list-group-item {
        border: none;
        background-color: #f8f9fa;
    }
</style> --}}

<div class="container my-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="box_main bg-light text-center">
                <div class="tshirt_img">
                    <img src="{{asset($product->product_image)}}" alt="" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-lg-8 col-md-6">
            <div class="box_main bg-light p-4 rounded">
                <!-- Product Name -->
                <h4 class="shirt_text text-left">{{$product->product_name}}</h4>

                <!-- Price -->
                <p class="price_text text-left">Price: 
                    <span style="color: #262626;">
                        $ {{$product->price}}
                    </span>
                </p>

                <!-- Short Description -->
                <div class="my-3">
                    <p class="lead">
                        {{$product->short_description}}
                    </p>
                </div>

                <!-- Long Description -->
                <div class="my-3">
                    <p>
                        {{$product->long_description}}
                    </p>
                </div>

                <!-- Category and Subcategory -->
                <ul class="list-group mb-3">
                    <li class="list-group-item">Category: {{$category->category_name}}</li>
                    <li class="list-group-item">Subcategory: {{$subcategory->subcategory_name}}</li>
                    <li class="list-group-item">Available Quantity: {{$product->count}}</li>
                </ul>

                <!-- Rating and Buttons -->
                <div class="d-flex align-items-center">
                    <div class="rating_text mr-3">
                        <p>Rating: {{$product->rating}}</p>
                    </div>
                    <div class="btn_main">
                        <button class="btn btn-outline-primary">Rate this Product</button>
                    </div>
                </div>

                <!-- Buy and See More Buttons -->
                <div class="mt-4 d-flex">
                    <form action="{{route('addproducttocart')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="form-group">
                            <input type="hidden" value='{{$product->price}}' name="price">
                            <label for="quantity">How many pieces?</label>
                            <input class="form-control" type="number" min="1" placeholder="1" name="quantity">
                        </div>
                        <input class="btn btn-success mr-2" type="submit" value="Add to cart">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .box_main {
        background-color: #f8f9fa; /* Muted light gray */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    }

    .shirt_text {
        font-weight: bold;
        font-size: 1.5rem;
        color: #333;
    }

    .price_text {
        font-size: 1.2rem;
        margin-top: 10px;
    }

    .tshirt_img img {
        max-height: 300px;
        object-fit: cover;
    }

    .rating_text {
        font-size: 1.2rem;
        color: #ff5900; /* Gold color for rating */
    }

    .btn_main button {
        font-size: 14px;
        font-weight: 600;
    }

    .list-group-item {
        border: none;
        background: transparent;
        padding: 0.5rem 0;
    }
</style>




@endsection


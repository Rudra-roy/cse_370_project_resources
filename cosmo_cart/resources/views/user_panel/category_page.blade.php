@extends('user_panel.layouts.template')
@section('main-content')

<div class="fashion_section">
    <div id="main_slider">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="fashion_taital">{{$category->category_name}} - ({{$category->product_count}})</h1>
                
                <!-- Sorting Form -->
                <form action="{{route('categorysort', $category->id)}}" method="GET" class="form-inline">
                    <div class="form-group">
                        <label for="sort" class="mr-2">Sort By: </label>
                        <select name="sort_by" id="sort" class="form-control mr-2">
                            <option value="price_asc">Price (Low to High)</option>
                            <option value="price_desc">Price (High to Low)</option>
                            <option value="rating_asc">Rating (Low to High)</option>
                            <option value="rating_desc">Rating (High to Low)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Sort</button>
                </form>
            </div>
            
            <div class="fashion_section_2">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                            <h4 class="shirt_text">{{$product->product_name}}</h4>
                            <p class="price_text">Price: 
                                <span style="color: #262626;">
                                    $ {{$product->price}}
                                </span>
                            </p>
                            <div class="tshirt_img">
                                <img src="{{asset($product->product_image)}}" alt="Product Image" class="img-fluid">
                            </div>

                            <!-- Rating Display -->
                            <div class="rating_text">
                                <p>Rating: {{$product->rating}}</p>
                            </div>
                            
                            <div class="btn_main">
                                <form action="{{route('addproducttocart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="price" value="{{$product->price}}">
                                    <input type="hidden" name="quantity" value="1">
                                    <input class="btn btn-success mr-2" type="submit" value="Add to cart">
                                </form>
                                <div class="seemore_bt">
                                    <a href="{{route('singleproduct', [$product->id, $product->slug, $product->product_category_id, $product->product_subcategory_id])}}">
                                        See More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .box_main {
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .shirt_text {
        font-weight: bold;
        font-size: 1.2rem;
    }

    .price_text {
        font-size: 1rem;
        color: #555;
        margin-top: 10px;
    }

    .rating_text p {
        font-size: 14px;
        color: #FFD700;
        font-weight: bold;
        margin: 10px 0;
    }

    .seemore_bt a {
        color: #fff;
        background-color: #007bff;
        padding: 5px 10px;
        border-radius: 4px;
        text-decoration: none;
    }
</style>

@endsection

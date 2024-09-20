@extends('user_panel.layouts.template')
@section('main-content')

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
                        <!-- Button to trigger rating modal -->
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#ratingModal">Rate this Product</button>
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

<!-- Rating Modal -->
<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ratingModalLabel">Rate This Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('rateproduct', $product->id)}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rating">Select Rating (1-5)</label>
                        <select class="form-control" id="rating" name="rating" required>
                            <option value="1">1 - Very Poor</option>
                            <option value="2">2 - Poor</option>
                            <option value="3">3 - Average</option>
                            <option value="4">4 - Good</option>
                            <option value="5">5 - Excellent</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit Rating</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="feedback-section my-5">
    <h4 class="mb-4">Customer Feedback</h4>

    <!-- Feedback Form -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Leave Your Feedback</h5>
        </div>
        <div class="card-body">
            <form action="{{route('submitFeedback', $product->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="content">Your Feedback</label>
                    <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit Feedback</button>
            </form>
        </div>
    </div>

    <!-- Displaying Existing Feedbacks -->
    <div class="feedback-list">
        <h5 class="mb-3">What Others Are Saying:</h5>

        <!-- Loop through existing feedback -->
        @foreach($feedbacks as $feedback)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-subtitle mb-2 text-muted">
                            <i class="fas fa-user-circle"></i> {{$feedback->user->name}} 
                        </h6>
                        <span class="text-muted">{{ $feedback->created_at ? $feedback->created_at->format('d M Y') : 'N/A' }}</span>
                    </div>
                    <hr>
                    <p class="card-text">{{$feedback->content}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .feedback-section {
        background-color: #f9f9f9;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .feedback-section h4 {
        font-weight: bold;
        color: #333;
    }

    .feedback-section .card {
        background-color: #fff;
        border: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .feedback-section .card-header {
        font-size: 1.25rem;
        background-color: #007bff;
        color: white;
    }

    .feedback-section .card-body {
        font-size: 1rem;
        color: #333;
    }

    .feedback-list h5 {
        font-size: 1.2rem;
        color: #007bff;
    }

    .card-subtitle {
        font-size: 0.9rem;
        font-weight: 600;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
    }
</style>


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

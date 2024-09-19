
@extends('user_panel.layouts.template')
@section('main-content')
<h2>Add to Cart</h2>
@if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="box_main">
            <div class="table-responsive">
                <table class='table'>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $total = 0;
                    @endphp
                    @foreach($cart_items as $item)
                    <tr>
                        @php
                            $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                            $product_image = App\Models\Product::where('id', $item->product_id)->value('product_image');   

                        @endphp
                        <td><img src="{{asset($product_image)}}" alt="{{$product_name}}" style="height: 50px;"></td>
                        <td>{{$product_name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price}}</td>
                        <td>
                            <a href="{{route('removecartitem', $item->id)}}" class="btn btn-danger">Remove</a>
                    </tr>

                    @php
                        $total += $item->price;
                    @endphp
                    @endforeach
                    @if ($total >0)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td class="text-center">{{$total}}</td>
                        <td><a href="{{route('shippingaddress')}}" class="btn btn-success">Checkout Now</a></td>
                    </tr>
                    @endif
                </table>
            </div>

        </div>
    </div>
</div>

@endsection


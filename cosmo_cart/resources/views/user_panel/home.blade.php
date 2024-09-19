@extends('user_panel.layouts.template')
@section('main-content')
<h2 class="py-5">Homepage</h2>
 {{-- <!-- banner section start -->
 <div class="banner_section layout_padding">
    <div class="container">
       <div id="my_slider" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
             <div class="carousel-item active">
                <div class="row">
                   <div class="col-sm-12">
                      <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                      <div class="buynow_bt"><a href="#">Buy Now</a></div>
                   </div>
                </div>
             </div>
             <div class="carousel-item">
                <div class="row">
                   <div class="col-sm-12">
                      <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                      <div class="buynow_bt"><a href="#">Buy Now</a></div>
                   </div>
                </div>
             </div>
             <div class="carousel-item">
                <div class="row">
                   <div class="col-sm-12">
                      <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                      <div class="buynow_bt"><a href="#">Buy Now</a></div>
                   </div>
                </div>
             </div>
          </div>
          <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
          <i class="fa fa-angle-left"></i>
          </a>
          <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
          <i class="fa fa-angle-right"></i>
          </a>
       </div>
    </div>
 </div>
 <!-- banner section end -->
</div> --}}

<!-- fashion section start -->
<div class="fashion_section">
    <div id="main_slider">
             <div class="container">
                <h1 class="fashion_taital">All Products</h1>
                <div class="fashion_section_2">
                   <div class="row">
                     @foreach($allproducts as $product)
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">{{$product->product_name}}</h4>
                            <p class="price_text">Price  <span style="color: #262626;">$ {{$product->price}}</span></p>
                            <div class="tshirt_img"><img src="{{asset($product->product_image)}}"></div>
                            <!-- Rating Display -->
                            <div class="rating_text">
                              <p>Rating: {{$product->rating}}</p>
                            </div>
                            
                            <style>
                              .rating_text p {
                                  font-size: 14px;
                                  color: #FFD700; /* Golden color for ratings */
                                  font-weight: bold;
                                  margin: 10px 0;
                              }
                              .price_text {
                                  margin-top: 10px;
                              }
                            </style>
                            
                            <div class="btn_main">
                              <form action="{{route('addproducttocart')}}" method="POST">
                                 @csrf
                                 <input type="hidden" name="product_id" value="{{$product->id}}">
                                 <input type="hidden" name="price" value="{{$product->price}}">
                                 <input type="hidden" name="quantity" value="1">


                                 <br>
                                 <input class="btn btn-success mr-2" type="submit" value="Add to cart">
                              </form>
                               <div class="seemore_bt"><a href="{{route('singleproduct', [$product->id, $product->slug, $product->product_category_id, $product->product_subcategory_id])}}">See More</a></div>
                            </div>
                         </div>
                      </div>
                     @endforeach
                   </div>
                </div>
            </div>
    </div>
 </div>
 <!-- fashion section end -->
 <!-- electronic section start -->
 <div class="fashion_section">
    <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
          <div class="carousel-item active">
             <div class="container">
                <h1 class="fashion_taital">Electronic</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Laptop</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home_/images/laptop-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Mobile</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home_/images/mobile-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Computers</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home_/images/computer-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="carousel-item">
             <div class="container">
                <h1 class="fashion_taital">Electronic</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Laptop</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home_/images/laptop-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Mobile</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home_/images/mobile-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Computers</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home_/images/computer-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="carousel-item">
             <div class="container">
                <h1 class="fashion_taital">Electronic</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Laptop</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home_/images/laptop-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Mobile</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home_/images/mobile-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Computers</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="electronic_img"><img src="{{asset('home_/images/computer-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <a class="carousel-control-prev" href="#electronic_main_slider" role="button" data-slide="prev">
       <i class="fa fa-angle-left"></i>
       </a>
       <a class="carousel-control-next" href="#electronic_main_slider" role="button" data-slide="next">
       <i class="fa fa-angle-right"></i>
       </a>
    </div>
 </div>
 <!-- electronic section end -->
 <!-- jewellery  section start -->
 <div class="jewellery_section">
    <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
          <div class="carousel-item active">
             <div class="container">
                <h1 class="fashion_taital">Jewellery Accessories</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Jumkas</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home_/images/jhumka-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Necklaces</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home_/images/neklesh-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Kangans</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home_/images/kangan-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="carousel-item">
             <div class="container">
                <h1 class="fashion_taital">Jewellery Accessories</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Jumkas</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home_/images/jhumka-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Necklaces</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home_/images/neklesh-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Kangans</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home_/images/kangan-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="carousel-item">
             <div class="container">
                <h1 class="fashion_taital">Jewellery Accessories</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Jumkas</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home_/images/jhumka-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Necklaces</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home_/images/neklesh-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">Kangans</h4>
                            <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                            <div class="jewellery_img"><img src="{{asset('home_/images/kangan-img.png')}}"></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <a class="carousel-control-prev" href="#jewellery_main_slider" role="button" data-slide="prev">
       <i class="fa fa-angle-left"></i>
       </a>
       <a class="carousel-control-next" href="#jewellery_main_slider" role="button" data-slide="next">
       <i class="fa fa-angle-right"></i>
       </a>
       <div class="loader_main">
          <div class="loader"></div>
       </div>
    </div>
 </div>
@endsection

@php
   $categories = App\Models\Category::latest()->get();
@endphp

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Cosmo-Cart</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home_/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home_/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('home_/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('home_/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('home_/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('home_/css/owl.carousel.min.css')}}">
      <link rel="stylesoeet" href="{{asset('home_/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="#">Best Sellers</a></li>
                           <li><a href="{{route('newrelease')}}">New Releases</a></li>
                           <li><a href="{{route('todaysdeal')}}">Today's Deals</a></li>
                           <li><a href="{{route('customerservice')}}">Customer Service</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="{{route('home')}}"><img src="{{asset('home_/images/logo.png')}}" height="200" width="250"></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.html">Home</a>
                     
                     @foreach ($categories as $category)
                        <li><a href="{{ route('categorypage', [$category->id, $category->slug]) }}">{{$category->category_name}}</a></li>
                     @endforeach
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="{{asset('home_/images/toggle-icon.png')}}"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach ($categories as $category)
                           <a class="dropdown-item" href="{{route('categorypage', [$category->id, $category->slug])}}">{{$category->category_name}}</a>
                        @endforeach
                     </div>
                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search this blog">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                     <div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="{{asset('home_/images/flag-uk.png')}}" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
                           <a href="#" class="dropdown-item">
                           <img src="{{asset('home_/images/flag-france.png')}}" class="mr-2" alt="flag">
                           French
                           </a>
                        </div>
                     </div>
                     <div class="login_menu">
                        <ul>
                           <li><a href="{{route('addtocart')}}">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="{{route('userprofile')}}">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Profile</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
        
      <!-- banner bg main end -->

      {{-- Common part --}}

      <div class="container py-5">
        @yield('main-content')
      </div>



      {{-- End of common part --}}

      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="{{route('home')}}"><img src="{{asset('home_/images/cosmo-cart-cyan.png')}}" height="200" width="250"></a></div>
            <div class="footer_menu">
               <ul>
                  <li><a href="#">New Releases</a></li>
                  <li><a href="#">Today's Deals</a></li>
                  <li><a href="#">Customer Service</a></li>
               </ul>
            </div>
            <div class="location_main">Prepared by : <a href="#">Group-1</a></div>
            <div class="location_main">Source code: <a href="https://github.com/Rudra-roy/cse_370_project_resources">Cosmo-Cart</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{asset('home_/js/jquery.min.js')}}"></script>
      <script src="{{asset('home_/js/popper.min.js')}}"></script>
      <script src="{{asset('home_/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('home_/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('home_/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('home_/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('home_/js/custom.js')}}"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>
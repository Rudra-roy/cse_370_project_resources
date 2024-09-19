@extends('user_panel.layouts.template')
@section('main-content')

<div class="container my-5">
    <div class="row">
        <!-- Left Side: Links Section -->
        <div class="col-md-4">
            <div class="card shadow-lg p-4" style="background-color: #f8f9fa; border-radius: 15px;">
                <div class="card-body">
                    <h4 class="text-center mb-4">Menu</h4>
                    <!-- Links Container -->
                    <div class="list-group">
                        <!-- Dashboard Link -->
                        <a href="{{route('userprofile')}}" class="list-group-item list-group-item-action">
                            Dashboard
                        </a>

                        <!-- Pending Orders Link -->
                        <a href="{{route('userpendingorders')}}" class="list-group-item list-group-item-action">
                            Pending Orders
                        </a>

                        <!-- History Link -->
                        <a href="{{route('orderhistory')}}" class="list-group-item list-group-item-action">
                            Order History
                        </a>

                        <!-- Logout Button -->
                        <form action="" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">
                                Logout
                            </button>
                        </form>
                    </div> <!-- End Links Container -->
                </div>
            </div>
        </div>

        <!-- Right Side: Greeting and Content Display Section -->
        <div class="col-md-8">
            <!-- User Greeting Section -->
            <div class="greeting-section text-center mb-4 p-5" style="background-color: rgba(255, 255, 255, 0.8); border-radius: 10px;">
                <h1 class="display-5 text-dark">Welcome, {{ Auth::user()->name }}!</h1> <!-- Display user's name -->
                <p class="lead text-muted">We're glad to have you back!</p>
            </div>

            <!-- Content Display Section -->
            <div class="card shadow-lg p-4" style="background-color: #f8f9fa; border-radius: 15px;">
                <div class="card-body">
                    <!-- You can fetch and display other content here -->
                    <h4 class="text-center mb-4">Profile Content</h4>
                    @yield('profile-content')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


<!DOCTYPE html>
<html lang="en" class="dark-style layout-menu-fixed" dir="ltr" data-theme="theme-dark" data-assets-path="{{ asset('dashboard_/assets/') }}" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('page_title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard_/assets/img/favicon/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dashboard_/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard_/assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard_/assets/vendor/css/theme-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard_/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard_/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard_/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <script src="{{ asset('dashboard_/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('dashboard_/assets/js/config.js') }}"></script>
    <style>
        body {
            background-color: #1e1e2f;
            color: #ffffff;
        }
        .layout-menu {
            background-color: #252b42;
        }
        .menu-item.active {
            background-color: #3a3e56;
        }
        .menu-link {
            color: #ffffff;
        }
        .menu-link:hover {
            background-color: #3a3e56;
            color: #ffffff;
        }
        .card {
            background-color: #2c2f4d;
            border: none;
        }
        .navbar {
            background-color: #1c1c2a;
        }
    </style>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Cosmo Cart</span>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <li class="menu-item active">
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Category</span></li>
                    <li class="menu-item">
                        <a href="{{ route('addcategory') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-category"></i>
                            <div data-i18n="Analytics">Add Category</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('allcategory') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-list-ul"></i>
                            <div data-i18n="Analytics">All Category</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Sub Category</span></li>
                    <li class="menu-item">
                        <a href="{{ route('addsubcategory') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-plus"></i>
                            <div data-i18n="Analytics">Add Sub Category</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('allsubcategory') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-list-ul"></i>
                            <div data-i18n="Analytics">All Sub Category</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Products</span></li>
                    <li class="menu-item">
                        <a href="{{ route('addproduct') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-plus"></i>
                            <div data-i18n="Analytics">Add Product</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('allproduct') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Analytics">All Product</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Orders</span></li>
                    <li class="menu-item">
                        <a href="{{ route('pendingorders') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-hourglass"></i>
                            <div data-i18n="Analytics">Pending Orders</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('completedorders') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-check"></i>
                            <div data-i18n="Analytics">Completed Orders</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cancelorders') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-x"></i>
                            <div data-i18n="Analytics">Cancel Orders</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="layout-page">
                <nav class="layout-navbar navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <input type="text" class="form-control border-0 shadow-none bg-dark text-white" placeholder="Search..." aria-label="Search..." />
                            </div>
                            <div class="nav-item">
                              <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                  @csrf
                                  <button type="submit" class="btn btn-danger ms-2">Logout</button>
                              </form>
                          </div>
                        </div>
                    </div>
                </nav>
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script src="{{ asset('dashboard_/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('dashboard_/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('dashboard_/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard_/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('dashboard_/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('dashboard_/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('dashboard_/assets/js/main.js') }}"></script>
</body>
</html>

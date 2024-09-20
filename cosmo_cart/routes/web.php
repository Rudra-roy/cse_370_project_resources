<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use Illuminate\Contracts\Session\Middleware\AuthenticatesSessions;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('user_panel.layouts.template');
// });

Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'Home',)->name('home');
});

Route::controller(ClientController::class)->group(function (){
    Route::get('/category-page/{id}/{slug}', 'CategoryPage')->name('categorypage');
    Route::get('/single-product-details/{id}/{slug}/{product_category_id}/{product_subcategory_id}', 'SingleProduct')->name('singleproduct');
    Route::get('/new-release', 'NewRelease')->name('newrelease');
    Route::get('/category-sort/{id}', 'CategorySort')->name('categorysort');

});

Route::middleware(['auth', 'role:user'])->group(function(){
    Route::controller(ClientController::class)->group(function (){
        Route::get('/add-to-cart', 'AddTocart')->name('addtocart');
        Route::post('/add-product-to-cart', 'AddProductTocart')->name('addproducttocart');
        Route::get('/check-out', 'CheckOut')->name('checkout');
        Route::get('/shipping-address', 'ShippingAddress')->name('shippingaddress');
        Route::get('/user-profile', 'UserProfile')->name('userprofile');
        Route::get('/user-profile/pending-orders', 'PendingOrders')->name('userpendingorders');
        Route::get('/user-profile/order-history', 'OrderHistory')->name('orderhistory');
        Route::get('/new-release', 'NewRelease')->name('newrelease');
        Route::get('/todays-deal', 'TodaysDeal')->name('todaysdeal');
        Route::get('/customer-service', 'CustomerService')->name('customerservice');
        Route::get('/remove-cart-item/{id}', 'RemoveCartItem')->name('removecartitem');
        Route::post('/rate-product/{id}', 'RateProduct')->name('rateproduct');
        Route::post('/submit-feedback/{id}', 'submitFeedback')->name('submitFeedback');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard_0');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');


Route::middleware(['auth', 'verified', 'role:admin'])->group(function(){
    Route::controller(CategoryController::class)->group(function (){
        Route::get('/all-category', "AllCategory")->name('allcategory');
        Route::get('/add-category', "AddCategory")->name('addcategory');
        Route::post('/store-category', 'StoreCategory')->name('storecategory');
        Route::get('/edit-category/{id}', 'EditCategory')->name('editcategory');
        Route::post('/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
    });
    
    Route::controller(SubCategoryController::class)->group(function (){
        Route::get('all-subcategory', "AllSubCategory")->name('allsubcategory');
        Route::get('add-subcategory', "AddSubCategory")->name('addsubcategory');
        Route::post('store-subcategory', 'StoreSubCategory')->name('storesubcategory');
        Route::get('edit-subcategory/{id}', 'EditSubCategory')->name('editsubcategory');
        Route::post('update-subcategory', 'UpdateSubCategory')->name('updatesubcategory');
        Route::get('delete-subcategory/{id}', 'DeleteSubCategory')->name('deletesubcategory');
    });
    
    Route::controller(ProductController::class)->group(function (){
        Route::get('all-product', "AllProduct")->name('allproduct');
        Route::get('add-product', "AddProduct")->name('addproduct');
        Route::post('store-product', 'StoreProduct')->name('storeproduct');
        Route::get('/edit-product/{id}', 'EditProduct')->name('editproduct');
        Route::post('/update-product', 'UpdateProduct')->name('updateproduct');
        Route::get('delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
        Route::get('product-edit-image/{id}', 'ProductEditImage')->name('producteditimage');
        Route::post('/update-product-image', 'UpdateProductImage')->name('updateproductimage');
    });
    
    Route::controller(OrderController::class)->group(function (){
        Route::get('pending-orders', "PendingOrders")->name('pendingorders');
        Route::get('completed-orders', "CompletedOrders")->name('completedorders');
        Route::get('cancel-orders', 'CancelOrders')->name('cancelorders');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






require __DIR__.'/auth.php';

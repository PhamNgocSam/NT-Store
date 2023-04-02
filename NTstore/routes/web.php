<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//frontend

//TRang chủ
Route::get('/', [HomeController::class, 'index']);
Route::get('/Trang_Chu', [HomeController::class, 'index']);
Route::post('/tim-kiem', [HomeController::class, 'search']);


//danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category_home']);


//thương hiệu sản phẩm trang chủ
Route::get('/thuong-hieu-san-pham/{brand_id}', [BrandProduct::class, 'show_brand_home']);


//chi tiet san pham
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'details_product']);


//cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/update-cart-quatity', [CartController::class, 'update_cart_quatity']);
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);

Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::get('/gio-hang', [CartController::class, 'gio_hang']);


//checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/payment', [CheckoutController::class, 'payment']);

Route::post('/add-user', [CheckoutController::class, 'add_user']);
Route::post('/save-checkout-user', [CheckoutController::class, 'save_checkout_user']);
Route::post('/login-user', [CheckoutController::class, 'login_user']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);



//backend

//login,logout admin
Route::get('/Admin', [AdminController::class, 'index']);
Route::get('/Dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);


//category product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);

Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);

Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);

Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product']);


//brand product
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product']);

Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);

Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);

Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);


//producer
Route::get('/add-producer', [ProducerController::class, 'add_producer']);
Route::get('/all-producer', [ProducerController::class, 'all_producer']);

Route::get('/edit-producer/{producer_id}', [ProducerController::class, 'edit_producer']);
Route::get('/delete-producer/{producer_id}', [ProducerController::class, 'delete_producer']);

Route::post('/save-producer', [ProducerController::class, 'save_producer']);
Route::post('/update-producer/{producer_id}', [ProducerController::class, 'update_producer']);


//product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);

Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);

Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);

Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);


//search_backend
Route::post('/search-category', [SearchController::class, 'search_category']);
Route::post('/search-brand', [SearchController::class, 'search_brand']);
Route::post('/search-producer', [SearchController::class, 'search_producer']);
Route::post('/search-product', [SearchController::class, 'search_product']);
Route::post('/search-order', [SearchController::class, 'search_order']);
Route::post('/search-user', [SearchController::class, 'search_user']);


//user
Route::get('/add-user', [UserController::class, 'add_user']);
Route::get('/all-user', [UserController::class, 'all_user']);

Route::get('/unactive-user/{user_id}', [UserController::class, 'unactive_user']);
Route::get('/active-user/{user_id}', [UserController::class, 'active_user']);

Route::get('/edit-user/{user_id}', [UserController::class, 'edit_user']);

Route::post('/save-user', [UserController::class, 'save_user']);
Route::post('/update-user/{user_id}', [UserController::class, 'update_user']);


//manage order
Route::get('/manage-order', [CheckoutController::class, 'manage_order']);
Route::get('/view-order/{orderId}', [CheckoutController::class, 'view_order']);

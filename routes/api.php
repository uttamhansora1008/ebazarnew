<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Mail\PendingMail;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Command\CompleteCommand;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);


Route::middleware('auth:api')->group( function () {

 Route::post('profile/{id}',[UserController::class,'profile']);
 Route::get('index',[\App\Http\Controllers\Api\CategoryController::class,'index']);
 Route::post('add_category',[\App\Http\Controllers\Api\CategoryController::class,'add_category']);
 Route::post('update_category/{id}',[\App\Http\Controllers\Api\CategoryController::class,'update']);
 Route::delete('category_delete/{id}',[\App\Http\Controllers\Api\CategoryController::class,'delete']);


 Route::get('subcategory/{category_id}',[\App\Http\Controllers\Api\SubCategoryController::class,'subcategory']);
 Route::post('add_subcategory',[\App\Http\Controllers\Api\SubCategoryController::class,'add_subcategory']);
 Route::post('update_subcategory/{id}',[\App\Http\Controllers\Api\SubCategoryController::class,'update_subcategory']);
 Route::delete('subcategory_delete/{id}',[\App\Http\Controllers\Api\SubCategoryController::class,'subcategory_delete']);

 Route::get('product',[\App\Http\Controllers\Api\ProductController::class,'product']);
 Route::post('add_product',[\App\Http\Controllers\Api\ProductController::class,'add_product']);
 Route::post('update_product/{id}',[\App\Http\Controllers\Api\ProductController::class,'update_product']);
 Route::delete('delete/{id}',[\App\Http\Controllers\Api\ProductController::class,'destory']);
 Route::delete('image_delete/{id}',[\App\Http\Controllers\Api\ProductController::class,'image_delete']);

 Route::get('/product-by-cat/{subcategory_id}', [\App\Http\Controllers\api\frontend\ProductController::class, 'product_by_cat']);
Route::get('/product-detail/{product_id}', [\App\Http\Controllers\api\frontend\ProductController::class, 'product_detail']);
Route::get('search/{name}', [\App\Http\Controllers\api\frontend\ProductController::class, 'search']);
Route::post('products/{product}/ratings', [\App\Http\Controllers\api\frontend\ProductController::class, 'rating']);

Route::get('/cart-detail', [\App\Http\Controllers\api\frontend\CartController::class, 'cart_detail']);
Route::post('add-to-cart/{id}',  [\App\Http\Controllers\api\frontend\CartController::class,'addToCart']);
Route::post('update_cart/{id}',[\App\Http\Controllers\api\frontend\CartController::class,'update_cart']);
Route::post('cart_delete',[\App\Http\Controllers\api\frontend\CartController::class,'cart_delete']);
Route::post('/order', [\App\Http\Controllers\api\frontend\CartController::class, 'order']);

Route::get('/wishlist', [WishlistController::class, 'index']);
Route::post('add-to-wishlist/{product}', [WishlistController::class, 'addToWishlist']);
Route::delete('delete_wishlist/{id}',[WishlistController::class,'delete_wishlist']);

Route::post('/changePassword',[UserController::class,'changePassword']);


});

Route::post('forget-password',[UserController::class,'forgetPassword']);

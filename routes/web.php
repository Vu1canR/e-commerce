<?php

use App\Comment;
use App\graphics;
use App\graphics_cards;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

Route::get('/create', 'App\Http\Controllers\Person@index');
Route::post('/create', 'App\Http\Controllers\Person@store');
// Route::get('/home', 'App\Http\Controllers\PostsController@index');
Route::get('/', 'App\Http\Controllers\PostsController@index');
Route::get('/posts/create', 'App\Http\Controllers\PostsController@create');
Route::post('/posts', 'App\Http\Controllers\PostsController@store');
// Route::post('/posts', 'App\Http\Controllers\ProductController@show');
// Route::get('/posts/{post}', 'App\Http\Controllers\PostsController@show');

// Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/product', function () {
    return view('product');
});

Route::get('/about', function () {
    return view('about');
});


Route::group(['middleware' => ['auth']], function(){
    Route::get('/about', function () {return view('about');});

    Route::get('/welcome', 'App\Http\Controllers\ProductController@homeProducts');

    // Route::group(['middleware' => ['admin']], function(){
    //     Route::get('/admin', function () {return view('admin');});
    //     Route::get('/welcome', 'App\Http\Controllers\ProductController@homeProducts');
    // });
});

Route::get('/welcome', 'App\Http\Controllers\ProductController@homeProducts')->name('welcome');


Route::get('/add', 'App\Http\Controllers\ProductController@addProduct');
Route::get('/add', 'App\Http\Controllers\ProductController@addProduct');
Route::get('/add/category', 'App\Http\Controllers\ProductController@byCategory');

Route::post('/add', 'App\Http\Controllers\ProductController@store');
Route::post('/category/{id}', 'App\Http\Controllers\ProductController@getId');

Route::get('/register', 'App\Http\Controllers\RegistrationController@create');
Route::post('/register', 'App\Http\Controllers\RegistrationController@store');

Route::get('/login', 'App\Http\Controllers\SessionsController@showLoginForm');
Route::post('/login', 'App\Http\Controllers\SessionsController@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\SessionsController@logout');
Route::post('/search', 'App\Http\Controllers\ProductController@search');
Route::post('/api/search', 'App\Http\Controllers\ProductController@axiosSearch');

Route::get('/c/{category}', 'App\Http\Controllers\CategoriesController@show');
Route::get('/about', function () {

    return view('about');
});

Route::get('/cat', 'App\Http\Controllers\CategoriesController@showSubCategories');

Route::post('/p/{store_code}-{product}', 'App\Http\Controllers\CommentsController@store');
Route::put('/p/comment-update', 'App\Http\Controllers\CommentsController@update');
Route::get('/p/{store_code}-{product}', 'App\Http\Controllers\ProductController@show');
Route::get('/c-{catId}/{subcatId}-{subcat}', 'App\Http\Controllers\ProductController@showAll');

Route::get('/test', function () {
    return view('test');
});
Route::post('/add/product-update', 'App\Http\Controllers\ProductController@update');

// Route::get('/usersoders', 'App\Http\Controllers\UserController@index');

Route::get('/cart', 'App\Http\Controllers\OrderController@showCart');
Route::post('/cart', 'App\Http\Controllers\OrderController@store');
Route::get('/track', 'App\Http\Controllers\OrderController@track');
Route::put('/track/{orderId}', 'App\Http\Controllers\OrderController@confirmation');
Route::get('/profile/{userId}', 'App\Http\Controllers\SessionsController@showProfile');
Route::post('/profile/{order}', 'App\Http\Controllers\OrderController@cancelOrder');

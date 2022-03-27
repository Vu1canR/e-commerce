<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => ['auth']], function () {
    Route::get('/about', function () {
        return view('about');
    });

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

// Route::post('/create-product', 'App\Http\Controllers\ProductController@store');
Route::get('api/category', 'App\Http\Controllers\api\ProductController@getCat');
Route::get('api/subcategory', 'App\Http\Controllers\api\ProductController@getSub');

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

Route::get('/test', function () {

    return view('test');
});

Route::get('/cat', 'App\Http\Controllers\CategoriesController@showSubCategories');

Route::post('/p/{store_code}-{product}', 'CommentsController@store');
Route::put('/p/comment-update', 'App\Http\Controllers\CommentsController@update');
Route::get('/p/{store_code}-{product}', 'App\Http\Controllers\ProductController@show');
Route::get('/c-{catId}/{subcatId}-{subcat}', 'App\Http\Controllers\ProductController@showAll');

// Route::get('/test', 'App\Http\Controllers\TestController@index');
Route::post('/api/values', 'App\Http\Controllers\TestController@values');

Route::post('/add/product-update', 'App\Http\Controllers\ProductController@update');

// Route::get('/usersoders', 'App\Http\Controllers\UserController@index');

Route::get('/cart', 'App\Http\Controllers\OrderController@showCart');
Route::post('/cart', 'App\Http\Controllers\OrderController@store');
Route::get('/track', 'App\Http\Controllers\OrderController@track');
Route::put('/track/{orderId}', 'App\Http\Controllers\OrderController@confirmation');
Route::get('/profile/{userId}', 'App\Http\Controllers\SessionsController@showProfile');
Route::post('/profile/{order}', 'App\Http\Controllers\OrderController@cancelOrder');


Route::post('/something/{test}', 'App\Http\Controllers\OrderController@cancelOrder');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth']], function () {

    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::get('products/check-slug', 'ProductController@checkSlug')->name('products.checkSlug');
    Route::resource('products', 'ProductController');
});

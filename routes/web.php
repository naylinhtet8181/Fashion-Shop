<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/item2', function () {
    return view('admin2.product');
});

Route::get('/admin3','AdminController@count');

Route::get('/chart', function () {
    return view('charts');
});

Route::get('/blank', function () {
    return view('blank');
});

Route::get('/card', function () {
    return view('cards');
});

Route::get('/table', function () {
    return view('tables');
});

Route::get('/other', function () {
    return view('utilities-other');
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin2',function(){
    return view('admin.index');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function (){
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::resource('/category', 'CategoryController');

    Route::resource('/item', 'ItemController');

    Route::resource('/order', 'OrderController');

    Route::resource('/user', 'UserController');


});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/','HomepageController@index')->name('homepage');

    Route::get('/wish-lists1','WishlistController@addtoWishlist')->name('wishlists');

Route::get('/wish-lists2','WishlistController@destroy')->name('destroy.wishlists');

Route::get('/wishlists','WishlistController@index');

Route::get('/cart1','CartController@addtoCart')->name('cart');

Route::get('/cart3','CartController@addtoCart2')->name('cart2');

Route::get('/cart2','CartController@destroy')->name('destroy.cart');

Route::put('/cart4/{id}','CartController@update')->name('update.cart');

Route::get('/cart', 'CartController@index');

Route::get('/checkout','CartController@checkout');

Route::post('/order','CartController@makeorder')->name('makeorder');

Route::get('/category/{id}','HomepageController@showCates');

Route::get('/product/all','ProductpageController@index')->name('product');

Route::get('/product/{id}','ProductpageController@showCates');

Route::get('/search','ProductpageController@search');

Route::get('/product-detail/{id}','ProductpageController@viewDetail');
});




<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Admin\AdminController@dashboard')->name('index')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/coinbase/webhook', 'Api\PaymentController@confirmCharge')->name('webhook');

//https://dashboard.thenftdoor.com/coinbase/webhook

Route::group(['middleware' => ['auth', 'verified', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('users', 'Admin\AdminController@users')->name('users');
    Route::delete('user/{id}', 'Admin\AdminController@delete_users')->name('delete_user');
    Route::get('user/paid/{id}', 'Admin\AdminController@paid')->name('paid');

    Route::resource('article', 'Admin\ArticleController');
    Route::resource('category', "Admin\CategoryController");
    Route::resource('nft', "Admin\NFTListingController");
    Route::resource('nft-giveaway', "Admin\NFTGiveawayController");
    Route::resource('toolbox', "Admin\ToolBoxController");

    Route::get('nft-images/{id}', "Admin\NFTListingController@nft_images")->name('nft_images');
    Route::post('nft-images', "Admin\NFTListingController@nft_gallery")->name('nft_gallery');

    Route::get('change-password', 'Admin\AdminController@password')->name('setting');
    Route::post('change-password', 'Admin\AdminController@store_password')->name('store_password');

});


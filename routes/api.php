<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**********************************   Category Route Starts Here   *******************************************/
Route::get('categories','CategoryController@index')->middleware('auth:sanctum');
Route::post('category/check/title','CategoryController@checkTitle')->middleware('auth:sanctum');
Route::post('category/check/slug','CategoryController@checkSlug')->middleware('auth:sanctum');
Route::post('category/store','CategoryController@store')->middleware('auth:sanctum');
Route::get('category/{id}/show','CategoryController@show');
Route::post('category/edit/check/title','CategoryController@checkEditTitle')->middleware('auth:sanctum');
Route::post('category/edit/check/slug','CategoryController@checkEditSlug')->middleware('auth:sanctum');
Route::post('category/update','CategoryController@update')->middleware('auth:sanctum');
Route::post('category/remove','CategoryController@remove')->middleware('auth:sanctum');
Route::get('category/{keyword}/search','CategoryController@searchCategory');
/**********************************   Category Route Ends Here   *******************************************/

/**********************************   Article Route Starts Here   *******************************************/
Route::get('articles','ArticleController@index');
Route::get('featured/articles','ArticleController@featured');
Route::post('article/check/title','ArticleController@checkTitle');
Route::post('article/check/category','ArticleController@checkCategory');
Route::post('article/check/body','ArticleController@checkBody');

Route::get('article','ArticleController@create')->middleware('auth:sanctum');

Route::post('article/store','ArticleController@store')->middleware('auth:sanctum');
Route::get('article/{id}/show','ArticleController@show')->middleware('auth:sanctum');
Route::post('article/update','ArticleController@update')->middleware('auth:sanctum');
Route::post('article/remove','ArticleController@remove')->middleware('auth:sanctum');
Route::get('article/{keyword}/search','ArticleController@searchArticle');
Route::get('article/{id}/comments','ArticleController@comments');
/**********************************   Article Route Ends Here   *******************************************/

/**********************************   Comment Route Starts Here   *******************************************/
Route::get('comments','CommentController@index')->middleware('auth:sanctum');
Route::post('comment/check/comment','CommentController@checkComment')->middleware('auth:sanctum');
Route::post('comment/check/article','CommentController@checkArticle')->middleware('auth:sanctum');
Route::post('comment/store','CommentController@store')->middleware('auth:api');
Route::get('comment/{id}/show','CommentController@show');
Route::post('comment/{id}/update','CommentController@update')->middleware('auth:sanctum');
Route::post('comment/{id}/remove','CommentController@remove')->middleware('auth:sanctum');
/**********************************   Comment Route Ends Here   *******************************************/
//
///**********************************   Author Route Starts Here   *******************************************/
Route::get('authors','AuthorController@index')->middleware('auth:sanctum');
Route::post('author/check/name','AuthorController@checkName');
Route::post('author/check/email','AuthorController@checkEmail');
Route::post('author/check/password','AuthorController@checkPassword');
//Route::post('register','AuthorController@register');
//Route::post('login','AuthorController@login');
Route::get('author/detail','AuthorController@getAuthor')->middleware('auth:sanctum');
//Route::post('logout','AuthorController@logout')->middleware('auth:api');

Route::get('current/user','AuthController@currentUser')->middleware('auth:sanctum');
/**********************************   Author Route Ends Here   *******************************************/

/**********************************   NFTListing Route Starts Here   *******************************************/

Route::get('nft','NFTListingController@index');
Route::get('nft/{id}/show','NFTListingController@show')->middleware('auth:sanctum');

/**********************************   NFTListing Route Ends Here   *******************************************/


/**********************************   NFT Giveaway Route Starts Here   *******************************************/

Route::get('nft/giveaway','NFTGiveawayController@index');
Route::post('nft/giveaway/{id}/show','NFTGiveawayController@show')->middleware('auth:sanctum');

/**********************************   NFT Giveaway Route Ends Here   *******************************************/


/**********************************   Payment Route Starts Here   *******************************************/

Route::get('payment/{id}','PaymentController@createCharge');

Route::post('inapp/payment', "PaymentController@inAppPayment")->middleware('auth:sanctum');
//Route::get('current/user','PaymentController@currentUser');
//Route::get('nft/giveaway/{id}/show','NFTGiveawayController@show')->middleware('auth:api');

/**********************************   NFT Giveaway Route Ends Here   *******************************************/

/**********************************   NFT Toolbox Route Starts Here   *******************************************/

Route::get('nft/toolbox','ToolBoxController@index');
Route::get('nft/toolbox/{id}/show','ToolBoxController@show')->middleware('auth:sanctum');

/**********************************   NFT Toolbox Route Ends Here   *******************************************/

/**********************************   Joined iveaway Route Starts Here   *******************************************/

//Route::get('nft/toolbox','ToolBoxController@index');
Route::post('join/nft/giveaway','JoinedGiveawayController@store');

/**********************************   Joined Giveaway Route Ends Here   *******************************************/


/**********************************   Author Route Starts Here   *******************************************/
Route::post('password/update','AuthController@change_password');
Route::post('register','AuthController@register');
Route::post('login','AuthController@login');
Route::post('logout','AuthController@logout')->middleware('auth:sanctum');


//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [HttpApp\Http\Controllers\API\AuthController::class, 'logout']);
});


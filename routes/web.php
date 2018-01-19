<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Http;
use App\User;

Route::get('/','WelcomeController@index');
//Route::get('/', function(){ return redirect('/image'); });
Route::resource('/image', 'ImageController');
Route::get('/view_profile/{id}/{to?}','ProfileViewController@view');
Route::post('/profile/contact/{id}','SendingEmailController@contact');
Auth::routes();
Route::get('delete/image/{album_name}/{image_name}','ProfileController@deleteImage');
Route::get('delete/album/{album_name}','ProfileController@deleteAlbum');
Route::post('create/album','ProfileController@createAlbum');
Route::post('addImage/{album}','ProfileController@addImage');
Route::get('/search/{type}','SearchController@index');
Route::post('/search','SearchController@sortBy');
Route::get('/home', 'HomeController@index');
Route::get('/profile','ProfileController@index');
Route::post('uploadAvatar','ProfileController@fileUpload');
Route::get('profile/update/{id}','ProfileController@showUpdatePage')->name('update-user-info');
Route::post('/profile/update','ProfileController@updateInfo');
Route::get('/show/rate/{id}','RatingReviewController@show');
Route::post('/profile/{rated_id}/rate/',[
    'as'=>'post_rating',
    'uses'=>'RatingReviewController@rateByGuest'
]);
Route::get('/profile/{rated_id}/{rate}',[
    'as'=>'post-rating-by-user',
    'uses'=>'RatingReviewController@rateByUser'
]);
Route::post('post/review/{id}','RatingReviewController@postReview');

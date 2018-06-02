<?php

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

Auth::routes();
///Facebook ///
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
///Google///
Route::get('/google-redirect', 'SocialAuthController@googleRedirect');
Route::get('/google-callback', 'SocialAuthController@googleCallback');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/setting','UserController@view');
Route::post('update-setting','UserController@upadateSetting');
Route::get('/create-product','ProductController@addProduct');
Route::post('/add-product','ProductController@saveProduct');
Route::get('product-list','ProductController@productList');
Route::get('delete-product/{id}','ProductController@deleteProduct');
Route::get('edit-product/{id}','ProductController@editProduct');
Route::post('edit-product/{id}','ProductController@updateProduct');


Route::group(['middleware' => 'admincheck'], function()
{
	Route::get('/create-user','UserController@createUser');
	Route::post('/create-user','UserController@addUser');
	Route::get('/all-users','UserController@allUsers');
	Route::get('/delete-user/{id}','UserController@deleteUser');
	Route::get('/edit-user/{id}','UserController@editUser');
	Route::get('/make-admin/{id}','UserController@makeAdmin');

});
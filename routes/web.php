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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::view('/about', 'about');

Route::get('/', 'HomePageController@index');

Route::get('/list', 'ListingPageController@index');

Route::get('/details', 'DetailsPageController@index');

Route::group(['prefix' => 'back', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminPageController@index');
    Route::resource('/category', 'CategoryController', ['middleware' => 'permission:Category List|All']);
    Route::put('/category/status/{id}', 'CategoryController@status', ['middleware' => 'permission:Category List|All']);
    Route::get('/create', 'CreateController@index');
    Route::get('/edit', 'EditController@index');
    Route::resource('/permission', 'PermissionController', ['middleware' => 'permission:Permission List|All']);
    Route::resource('/role', 'RoleController');
    Route::resource('/author', 'AuthorController');
});

//Route::get('/adminpage', 'AdminPageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

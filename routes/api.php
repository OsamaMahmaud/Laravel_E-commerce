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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace'=>'Dashbord'],function(){

    Route::get('index','IndexController@index')->name('admin');

    Route::resource('Categories', 'CategoriesController')->except('show', 'create');
    Route::resource('products', 'ProductsController');


});




// start setting
Route::get('setting/index','SettingsController@index' )->name('dashboard.settings.index');
Route::put('setting/{settings}/update','SettingsController@update')->name('dashboard.settings.update');
// End setting



Route::get('/{page}', 'AdminController@index');


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

Auth::routes();



// Route::get('/', function () {
//     return view('auth.login');
// })->name('index');

// Route::get('/', function () {
//     return view('auth.login');
// })->name('index');

Route::get('/', function () {
    return view('Site.index_2');
})->name('index');

Route::group(['namespace'=>'Site'],function () {

    Route::get('categories','CategoriesController@index')->name('categories');

    Route::get('product','ProductController@index')->name('products');

    Route::get('product/{cat_id}','ProductController@index')->name('products');

});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/{page}', 'AdminController@index');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;
use App\Models\{Categorie,User,Place};

/*
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


Route::controller(CategorieController::class)->group(function(){
    Route::get('/categories/show/{categorie}','show')->name('categories.show');
    Route::get('/categories','index')->name('categories.index');
    Route::post('/categories/store','store')->name('categories.store');
    Route::post('/categories/update/{categorie}','update')->name('categories.update');
    Route::get('/categories/delete/{categorie}','destroy')->name('categories.delete');
});

Route::controller(PlaceController::class)->group(function(){
    Route::get('/places/show/{place}','show')->name('places.show');
    Route::get('/places','index')->name('places.index');
    Route::post('/places/store','store')->name('places.store');
    Route::post('/places/update/{place}','update')->name('places.update');
    Route::get('/places/delete/{place}','destroy')->name('places.delete');
});


// // Route::resource('categories', CategorieController::class);
// // Route::resource('places', PlaceController::class);
// // Route::resource('users', UserController::class);

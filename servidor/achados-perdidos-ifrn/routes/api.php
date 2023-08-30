<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;
use App\Models\{Categorie,User,Place};

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// // Route::apiResource('categories', CategorieController::class);
// // Route::apiResource('places', PlaceController::class);
// // Route::apiResource('users', UserController::class);

// // Route::get('api/categories/{categorie}',[CategorieController::class,'index']);

// Route::get('api/categories/{categorie}',function(Categorie $categorie){

//     return response()->json($categorie);
// });


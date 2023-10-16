<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Place;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Iten;
use App\Http\Requests\CategorieRequest;
use App\Http\Requests\PlaceRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ItenRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});


// // AUTH JWT ----------------------------------------------
// Route::post('/login',function(LoginRequest $request){
//     $credentials= $request->only(['email','password']);

//     if(!$token=auth('api')->attempt($credentials)){
//         return abort(401,"Não Autorizado");
//     }else{
// 	//mandando o token após o login bem feito
//         return response()->json([
//             // 'data'=>[
//                 'access_token'=>$token,
//                 'token_type'=>'bearer',
//                 'expires_in'=>auth('api')->factory()->getTTL()*60,
//             // ]
//         ]);
//     }
// })->name('login');

// Route::post('/register',function(Request $request){
//     // return $request->only(['email','password', 'name']);
//     User::create($request->all());
//     return response(200);
// })->name('register');

// -----------------------------------------------------



// PLACES ----------------------------------------------

Route::get('/places/list', function () {
    return response(Place::all(),200);
});

Route::post('/places/store', function (Request $request) {
    Place::create($request->all());
    return response(201);
});

Route::put('/places/update/{place}', function (Request $request, Place $place) {
    $place->update($request->all());
    return response(200);
});

Route::delete('/places/{place}', function (Request $request, Place $place) {
    $place->delete();
    return response(200);
});

Route::get('/places/view/{place}', function (Request $request, Place $place) {
    return response($place,200);
});
// -----------------------------------------------------



// CATEGORIES ----------------------------------------------

Route::get('/categories/list', function () {
    return Categorie::all();
});

Route::post('/categories/store', function (Request $request) {
    Categorie::create($request->all());
});

Route::put('/categories/update/{categorie}', function (Request $request, Categorie $categorie) {
    $categorie->update($request->all());
    return response(200);
});

Route::delete('/categories/{categorie}', function (Request $request, Categorie $categorie) {
    $categorie->delete();
    return response(200);
});

Route::get('/categories/view/{categorie}', function (Request $request, Categorie $categorie) {
    return response($categorie,200);
});

// -----------------------------------------------------



// ITENS ----------------------------------------------

Route::get('/itens/list', function () {
    $itens = Iten::all();
    return response($itens,200);  
});

Route::get('/itens/losts', function () {
    $iten= Iten::where('refound',false)->get();
    return response($iten,200);    
});


Route::get('/itens/show/{iten}', function (Request $request, Iten $iten) {
    return response($iten,200);  
});

Route::get('/itens/refounds', function () {
    $itens = \DB::table('itens')->where('refound','=',true)->get();
    return response($itens,200); 
});

Route::post('/itens/store', function (Request $request) {
    Iten::create($request->all());
    return response(201);
});

Route::delete('/itens/{iten}', function (Request $request, Iten $iten) {
    if($iten->refound==false){

        return response("Erro, não é possivel apagar pois ainda não foi devolvido",500);
    }else{
        $iten->delete();
        return response(200);
    }
});

// Route::put('/itens/update/{iten}', function (Request $request, Iten $iten) { 
//     $iten->update($request->all());
//     return response(200);
// });

Route::get('/itens/refound/{iten}', function (Request $request,Iten $iten) {
    $iten->update([
        'refound'=>true,
    ]);
    return response(200);
});

Route::get('/itens/reopen/{iten}', function (Request $request,Iten $iten) {
    $iten->update([
        'refound'=>false,
    ]);
    return response(200);
});


// -----------------------------------------------------

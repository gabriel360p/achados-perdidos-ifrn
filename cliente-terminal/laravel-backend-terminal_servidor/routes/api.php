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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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


// Route::post('/suap-dados-usuario', function (Request $request) {
//     $user = [
//         'campus' => $request->campus,
//         'cpf' => $request->cpf,
//         'data_de_nascimento' => $request->data_de_nascimento,
//         'email' => $request->email,
//         'email_academico' => $request->email_academico,
//         'email_google_classroom' => $request->email_google_classroom,
//         'email_preferencial' => $request->email_preferencial,
//         'email_secundario' => $request->email_secundario,
//         'foto' => $request->foto,
//         'identificacao' => $request->identificacao,
//         'nome' => $request->nome,
//         'nome_registro' => $request->nome_registro,
//         'nome_social' => $request->nome_social,
//         'nome_usual' => $request->nome_usual,
//         'primeiro_nome' => $request->primeiro_nome,
//         'sexo' => $request->sexo,
//         'tipo_usuario' => $request->tipo_usuario,
//         'ultimo_nome' => $request->ultimo_nome,
//     ];

//     session()->put('UserSession', $user);

//     return response($user, 200);
// });




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

Route::get('/places', function () {
    return response(Place::all(), 200);
});

Route::post('/places', function (Request $request) {
    $validator = Validator::make(
        $request->all(),
        [
            'name' => 'required',
        ],
    );

    if ($validator->fails()) {
        return response(json_encode([
            'Mensagem' => 'Precisa inserir um nome referente a esse lugar',
        ]), 400);
    } elseif (sizeof(\DB::table('places')->where('name', 'like', '%' . $request->name)->get()) != 0) {
        return response(json_encode([
            'Mensagem' => 'Este lugar ja esta cadastrado',
        ]), 400);
    } else {
        $place = Place::create($request->all());
        return response($place, 201);
    }
});

Route::put('/places', function (Request $request) {
    $validator = Validator::make(
        $request->all(),
        [
            'name' => 'required',
        ],
    );

    $place = Place::FindOrFail($request->id);

    if ($validator->fails()) {
        return response(json_encode([
            'Mensagem' => 'Todos os campos precisam ser preenchidos',
        ]), 400);
    } elseif (sizeof(\DB::table('places')->where('name', 'like', '%' . $request->name)->get()) != 0) {
        return response(json_encode([
            'Mensagem' => 'Este lugar ja esta cadastrado',
        ]), 400);
    } else {
        $place->update($request->all());
        return response($place, 200);
    }
});

Route::delete('/places', function (Request $request) {

    $place = Place::findOrFail($request->id);
    if (!$place) {
        return response(['Mensagem' => 'Lugar não encontrado'], 404);
    } else {
        $place->delete();
        return response(200);
    }
});

Route::get('/places/view', function (Request $request) {
    $place = Place::findOrFail($request->id);
    if ($place) {
        return response($place, 200);
    } else {
        return response(['Mensagem' => 'Lugar não encontrado'], 404);
    }
});

Route::get('/places-names', function (Request $request) {
    $places = Place::all(['id', 'name']);
    return response($places, 200);
});
// -----------------------------------------------------



// CATEGORIES ----------------------------------------------

Route::get('/categories', function () {
    return Categorie::all();
});

Route::post('/categories', function (Request $request) {
    $validator = Validator::make(
        $request->all(),
        [
            'name' => 'required',
        ],
    );

    if ($validator->fails()) {
        return response(json_encode([
            'Mensagem' => 'Precisa inserir um nome referente a esse lugar',
        ]), 400);
    } else {
        $categorie = Categorie::create($request->all());
        return response($categorie, 200);
    }
});

Route::put('/categories', function (Request $request) {
    $categorie = Categorie::findOrFail($request->id);

    $validator = Validator::make(
        $request->all(),
        [
            'name' => 'required',
        ],
    );

    if ($validator->fails()) {
        return response(json_encode([
            'Mensagem' => 'Todos os campos precisam ser preenchidos',
        ]), 400);
    } elseif (sizeof(\DB::table('categories')->where('name', 'like', '%' . $request->name)->get()) != 0) {
        return response(json_encode([
            'Mensagem' => 'Esta categoria ja esta cadastrada',
        ]), 400);
    } else {
        $categorie->update($request->all());
        return response($categorie, 200);
    }
});

Route::delete('/categories', function (Request $request) {
    $categorie = Categorie::findOrFail($request->id);

    if (!$categorie) {
        return response(['Mensagem' => 'Lugar não encontrado'], 404);
    } else {
        $categorie->delete();
        return response(200);
    }
});

Route::get('/categories/view', function (Request $request) {
    $categorie = Categorie::findOrFail($request->id);

    if ($categorie) {
        return response($categorie, 200);
    } else {
        return response(["Mensagem" => "Categoria nao encontrada"], 404);
    }
});

Route::get('/categories-names', function (Request $request) {
    $categories = Categorie::all(['id', 'name']);
    return response($categories, 200);
});


// -----------------------------------------------------



// ITENS ----------------------------------------------

Route::post('/itens', function (Request $request) {
    if (sizeof(\DB::table('categories')->where('name', 'like', '%' . $request->categorie)->get()) == 0) {
        return response(json_encode([
            'Mensagem' => 'Categoria nao encontrada',
        ]), 400);
    } elseif (sizeof(Place::where('name', 'like', '%' . $request->place)->get()) == 0) {

        return response(json_encode([
            'Mensagem' => 'Local nao encontrado',
        ]), 400);
    } else {
        $cat = Categorie::where('name', 'like', '%' . $request->categorie . '%')->first();
        $pl = Place::where('name', 'like', '%' . $request->place . '%')->first();

        $iten = Iten::create([
            'categorie' => $cat->name,
            'place' => $pl->name,
            'name' => $request->name,
        ]);
        return response($iten, 201);
    }
});

Route::get('/itens', function () {
    $itens = Iten::all();
    return response($itens, 200);
});

Route::get('/itens/view', function (Request $request) {
    $iten = Iten::findOrFail($request->id);
    if ($iten) {
        return response($iten, 200);
    } else {
        return response(["Mensagem" => "Item não encontrado"], 404);
    }
});

Route::delete('/itens', function (Request $request) {
    $iten = Iten::findOrFail($request->id);
    if ($iten->refound == false) {
        return response(["Mensagem" => "Erro, não é possivel apagar pois ainda não foi devolvido"], 400);
    } else {
        $iten->delete();
        return response(["Mensagem" => "Item apagado"], 200);
    }
});

Route::get('/itens/refound', function (Request $request) {
    $iten = Iten::findOrFail($request->id);
    if (!$iten) {
        return response(["Mensagem" => "Erro, item não encontrado"], 404);
    } else {
        $iten->delete();
        return response(['Mensagem' => 'Item devolvido'], 200);
    }
});

Route::get('/itens-names', function () {
    $itens = Iten::all(['id', 'name', 'refound']);
    return response($itens, 200);
});
// -----------------------------------------------------

<?php

use App\Models\Place;
use App\Models\Categorie;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// PLACES ----------------------------------------------

Route::get('/places', function () {
    return response(Place::all(), 200);
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



Route::middleware(['SuapToken'])->group(function () {

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
    });;
    // -----------------------------------------------------

});



// CATEGORIES ----------------------------------------------


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
Route::get('/categories', function () {
    return response(Categorie::all());
});

Route::middleware(['SuapToken'])->group(function () {
    Route::post('/categories', function (Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
            ],
        );

        if ($validator->fails()) {
            return response(json_encode([
                'Mensagem' => 'Precisa inserir um nome referente a essa categoria',
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
});
// -----------------------------------------------------



// ITENS ----------------------------------------------


Route::get('/items-names', function () {
    $itens = Item::all(['id', 'name', 'refound']);
    return response($itens, 200);
});


Route::get('/items', function () {
    $itens = Item::all();
    return response($itens, 200);
});

Route::get('/items/view', function (Request $request) {
    $iten = Item::findOrFail($request->id);
    if ($iten) {
        return response($iten, 200);
    } else {
        return response(["Mensagem" => "Item não encontrado"], 404);
    }
});

Route::middleware(['SuapToken'])->group(function () {

    Route::post('/items', function (Request $request) {
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

            $iten = Item::create([
                'categorie' => $cat->name,
                'place' => $pl->name,
                'name' => $request->name,
            ]);
            return response($iten, 201);
        }
    });


    Route::delete('/items', function (Request $request) {
        $iten = Item::findOrFail($request->id);
        if ($iten->refound == false) {
            return response(["Mensagem" => "Erro, não é possivel apagar pois ainda não foi devolvido"], 400);
        } else {
            $iten->delete();
            return response(["Mensagem" => "Item apagado"], 200);
        }
    });

    Route::get('/items/refound', function (Request $request) {
        $iten = Item::findOrFail($request->id);
        if (!$iten) {
            return response(["Mensagem" => "Erro, item não encontrado"], 404);
        } else {
            $iten->delete();
            return response(['Mensagem' => 'Item devolvido'], 200);
        }
    });

    // -----------------------------------------------------
});

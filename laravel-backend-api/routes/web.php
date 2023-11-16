<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/profile', function () {
    return view('profile');
})->middleware(['suapToken']);

Route::get('/painel', function () {
    $session = session()->get('UserSession');
    return view('painel', ['session' => $session]);
});

Route::post('/user-session-storage', function (Request $request) {
    $user = [
        'campus' => $request->campus,
        'cpf' => $request->cpf,
        'data_de_nascimento' => $request->data_de_nascimento,
        'email' => $request->email,
        'email_academico' => $request->email_academico,
        'email_google_classroom' => $request->email_google_classroom,
        'email_preferencial' => $request->email_preferencial,
        'email_secundario' => $request->email_secundario,
        'foto' => $request->foto,
        'identificacao' => $request->identificacao,
        'nome' => $request->nome,
        'nome_registro' => $request->nome_registro,
        'nome_social' => $request->nome_social,
        'nome_usual' => $request->nome_usual,
        'primeiro_nome' => $request->primeiro_nome,
        'sexo' => $request->sexo,
        'tipo_usuario' => $request->tipo_usuario,
        'ultimo_nome' => $request->ultimo_nome,
    ];

    session()->put('UserSession', $user);
    return response($request);
});




















































// Route::get('/perfil', function () {
//     //pegando soo
//     $session = session()->get('UserSession');
//     return view('perfil',['session'=>$session]);
// })->middleware(['suapToken']);

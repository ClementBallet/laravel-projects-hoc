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
    // Retrouver les infos de session
    var_dump(session()->all());
    // Accéder à un index de la session
    echo session()->get('_token');
    // Stocker une info permanente en session
    session(["_user_id" => 14]);
    // Ou 2eme solution 
    session()->push('_table', 'ronde');
    // Supprimer un index de la session
    session()->forget('_table');
    // Tout supprimer dans la session
    session()->flush();

    return view('welcome');
});

Route::get('/coucou', function () {
    // On stocke dans la session une info pour la requète HTTP suivante, càd que l'info est dispo seulement pour la page suivante
    session()->flash('_status', 'Le post a été ajouté');
    var_dump(session()->all());
});

Route::get('/hello', function () {
    // On affiche l'info stockée. Si on actualise la page elle disparait
    session()->get('_status');
    var_dump(session()->all());
});

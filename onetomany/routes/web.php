<?php

use App\User;

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

Route::get('/create', function () {
    $User = User::findOrFail(1);
    $User->posts()->save(
        new App\Post(
            [
                "title" => "Mon premier post",
                "body"  => "Contenu de mon premier post"
            ]
        )
    );
});

Route::get('/read', function () {
    $User = User::findOrFail(1);

    foreach ($User->posts as $post) {
        echo $post->title . "\n" . $post->body . "\n";
    }
    return $User->posts;   // On ne met pas les parenthèses de la méthode car on ne fait pas d'action dessus
});

Route::get('/update', function () {
    $User = User::findOrFail(1);
    $User->posts()->whereId(1)->update(   // On met les parenthèses de la méthode posts car on fait des actions dessus
        [
            "body"  => "Le contenu de mon premier post a été modifié"
        ]
    );
});

Route::get('/delete', function () {
    $User = User::findOrFail(1);
    // Suppression de 1 post :
    $User->posts()->whereId(1)->delete(); 
    // Suppression de tous les posts :
    $User->posts()->delete(); 
});


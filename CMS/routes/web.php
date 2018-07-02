<?php

use App\Post;
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

/*
|--------------------------------------------------------------------------
| CRUD
|--------------------------------------------------------------------------
|
| Routing pour un CRUD
|
*/

/**
 * Méthode SQL insertion de données
 */
Route::get('/insert', function() {
    $req = "INSERT INTO posts(title, content, user_id) VALUES(?,?,?)";
    
    DB::insert($req,["PHP avec Laravel","Laravel est plutôt facile",1]); 
});

/**
 * Méthode SQL lire des données
 */
Route::get('/read', function () {
    $req = "SELECT * FROM posts WHERE id = ?";
    
    $post = DB::select($req,[1]); 
    var_dump($post);
});

/**
 * Méthode SQL mettre à jour des données
 */
Route::get('/update', function () {
    $req = "UPDATE posts SET title = ?, content = ? WHERE id  = ?";
    
    DB::update($req,["Post mis à jour","C'était facile",1]);
});

/**
 * Méthode SQL suppresion de données
 */
Route::get('/delete', function () {
    $req = "DELETE FROM posts WHERE id = ?";
    
    DB::delete($req,[1]);
});

/*
|--------------------------------------------------------------------------
| ELOQUENT ORM
|--------------------------------------------------------------------------
|
| 
|
*/

Route::get('/basicinsert', function () {
    $Post = new Post();

    $Post->title = "Créé avec Eloquent";
    $Post->content = "Lorem Ipsum";
    $Post->user_id = 1;

    $Post->save();
});

Route::get('/find', function () {
    // Trouver un post
    $Post = Post::find(2);
    $Post = $Post->title;
    var_dump($Post);

    // Trouver tous les posts
    $Posts = Post::all();
    var_dump($Posts);
});

Route::get('/basicupdate', function () {
    $Post = Post::find(2);
    $Post->title = "Mis à jour via Eloquent";

    $Post->save();
});

Route::get('/findwhere', function () {
    $Post = Post::where('title', '=', 'Mis à jour via Eloquent')->take(1)->get();
    return $Post;
});

Route::get('/findmore', function () {
    $Post = Post::where('title', '=', 'Mis à jour via Eloquent')->firstOrFail();
    return $Post;
});

/**
 * Méthode qui créée une nouvelle donnée
 * 
 * Attention : il est impératif de créer dans le model une variable protected $fillable
 */
Route::get('/create', function () {
    $values = [
        "title"   => "Créé via create",
        "content" => "EZ",
        "user_id" => 1
    ];
    
    Post::create($values);
});

Route::get('/updateeloquent', function () {
    Post::where('id', 2)->where('is-admin', 0)->update(
        [
            "title" => "Mis à jour via l'update Eloquent",
            "content" => "Nouveau contenu via l'update Eloquent"
        ]
    );
});

/**
 * 1ère méthode de delete via eloquent
 */
Route::get('/deleteeloquent', function () {
    $Post = Post::find(2);
    $Post->delete();
});

/**
 * 2ème méthode de delete via eloquent
 */
Route::get('/deleteeloquent2', function () {
    Post::destroy([2,3]);
});

/**
 * Soft Delete (equivaut à mettre un post à la corbeille sur WordPress)
 */
Route::get('/softdelete', function () {
    Post::find(4)->delete();
});

/**
 * Force Delete, supprime définitivement les entrées en soft delete
 */
Route::get('/forcedelete', function () {
    Post::onlyTrashed()->forceDelete();
});

/**
 * Restaure une entrée mise en soft delete
 */
Route::get('restore', function () {
    Post::withTrashed()->where('id', 12)->restore();
});

/**
 * Lire une entrée mise en soft delete
 */
Route::get('readsoftdelete', function () {
    return Post::onlyTrashed()->get();
});

Route::get('/accessor', function () {
    $user = App\User::findOrFail(1);
    echo $user->name;
});

Route::get('/mutator', function () {
    $user = App\User::findOrFail(1);
    $user->name = "George Abitbol";
    $user->save();
});

Route::get('/scope', function () {
    var_dump(User::latest());
    die();
});

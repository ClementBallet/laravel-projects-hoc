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
    return view('welcome');
});

Route::get('/hey', function () {
    return "<h1>HEY!</h1>";
});

Route::get('/zbra', function () {
    return "<h1>ZBRA!</h1>";
});

/**
 * Passer une donnée dans l'URL et la récupérer avec la route
 */
Route::get('/user/{id}', function($id) {
    return $id;
});

Route::get('/contact', function() {
    return view('contact');
});



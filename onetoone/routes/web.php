<?php

use App\User;
use App\Address;

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
    // Récupère l'user à l'id 1
    $User = User::findOrFail(1);

    $Address = new Address();
    $Address->name = "Lorem ipsum";

    $User->address()->save($Address);
});

Route::get('/read', function () {
    $User = User::findOrFail(1);
    return $User->address->name;
});

Route::get('/update', function () {
    $Address = Address::whereUserId(1)->first();
    $Address->name = "21 Jump Street";
    $Address->save();
});

Route::get('/delete', function () {
    $User = User::findOrFail(1);

    $User->address()->delete();
});


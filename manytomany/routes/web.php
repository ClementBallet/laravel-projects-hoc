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

    $User->roles()->save(
        new App\Role(
            [
                "name" => "Author"
            ]
        )
    );

    // $User->roles()->save(
    //     new App\Role(
    //         [
    //             "name" => "Subscriber"
    //         ]
    //     )
    // );
});

Route::get('/read', function () {
    $User = User::findOrFail(1);

    foreach ($User->roles as $role) {
        echo $role->name . "\n";
    }
    return $User->roles;
});

Route::get('/update', function () {
    $User = User::findOrFail(1);

    if($User->has('roles')) {
        foreach ($User->roles as $role) {
            if($role->name == "Admin") {
                $role->name = "Super Admin";
                $role->save();
            }
        }
    }
});

Route::get('/delete', function () {
    $User = User::findOrFail(1);
    $User->roles()->delete();
});

Route::get('/attach', function () {
    $User = User::findOrFail(1);
    $User->roles()->attach(3);
});

Route::get('/detach', function () {
    $User = User::findOrFail(1);
    $User->roles()->detach(3);
});

Route::get('/sync', function () {
    $User = User::findOrFail(1);
    $User->roles()->sync([1,2]);
});

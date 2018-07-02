<?php

use App\User;
use App\Post;
use App\Staff;
use App\Photo;

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
    $Post = Post::findOrFail(1);
    $Staff = Staff::findOrFail(1);

    $User->photos()->create(
        ["path" => "clement.jpg"]
    );
    $Post->photos()->create(
        ["path" => "post.jpg"]
    );
    $Staff->photos()->create(
        ["path" => "staff.jpg"]
    );
});

Route::get('/read', function () {
    $User = User::findOrFail(1);
    $Post = Post::findOrFail(1);
    $Staff = Staff::findOrFail(1);

    foreach ($User->photos as $photo) {
        echo $photo->path;
    }
    echo $User->photos[0]->path;

    foreach ($Post->photos as $photo) {
        echo $photo->path;
    }
    echo $Post->photos[0]->path;

    foreach ($Staff->photos as $photo) {
        echo $photo->path;
    }
    echo $Staff->photos[0]->path;
});

Route::get('/update', function () {
    $User = User::findOrFail(1);
    $Post = Post::findOrFail(1);
    $Staff = Staff::findOrFail(1);

    if($Post->has('photos')) {
        foreach ($Post->photos as $photo) {
            if($photo->path == "post.jpg") {
                $photo->path = "nouveaupost.jpg";
                $photo->save();
            }
        }
    }

    //  Autre solution
    $photo = $Staff->photos()->whereId(1)->first();
    $photo->path = "changedagain.jpg";
    $photo->save();
});

Route::get('/delete', function () {
    $Staff = Staff::findOrFail(1);
    $Staff->photos()->wherePath("staff.jpg")->delete();
});

Route::get('/assign', function () {
    $Staff = Staff::findOrFail(1);
    $Photo = Photo::findOrFail(4);

    $Staff->photos()->save($Photo);
});

Route::get('/unassign', function () {
    $Staff = Staff::findOrFail(1);
    $Staff->photos()->whereId(4)->update(
        [
            "imageable_type" => ''
        ]
    );
});
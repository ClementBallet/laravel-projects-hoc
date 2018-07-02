<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Requests\PostsRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupère tous les posts et on stocke dans $posts
        $posts = Post::all();
        // Retourne les posts à la vue index.blade.php 
        return view('posts.index', compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $User = User::findOrFail(1);
        $User->posts()->save(
            new Post(
                $request->all()
            )
        );
        return redirect('posts');

        // Autre solution plus courante :

        // $input = $request->all();
        // $Post = new Post();
        // $Post->title = $input["title"];
        // $Post->content = $input["content"];
        // $Post->is_active = $input["is-active"];
        // $User->posts()->save($Post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Récupère le post avec l'id passé en paramètre de l'URL
        $Post = Post::findOrFail($id);
        return view('posts.show', compact("Post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Post = Post::findOrFail($id);
        return view('posts.edit', compact("Post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest $request, $id)
    {
        $Post = Post::findOrFail($id);
        // MAJ du post
        $Post->update($request->all());
        // Redirige ensuite vers la page de notre choix
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::whereId($id)->delete();
        return redirect()->route('posts.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Events\NuevoPost;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $datos['posts'] = $posts;
        return view('posts.listado', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $datos = $request->all();
        $post = Post::create($datos);

        if (!$post) {
            return 'Error!';
        }

        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load(
            'creadoPor:id,nombre'
        );

        return view('posts.ver', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $datos = [
            'post' => $post
        ];
        return view('posts.editar', $datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $datos = $request->all();
        $actualizado = $post->update($datos);

        if (!$actualizado) {
            return 'Error!';
        }

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

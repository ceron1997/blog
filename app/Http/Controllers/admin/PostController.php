<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage; // para almacenar imagenes

class PostController extends Controller
{

    public function __construct()
    {
        // este es un midleware para la proteccion de rutas
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =  Category::pluck('name', 'id');
        // return $categories;

        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        //   Storage::put('posts', $request->file('file'));
        $post = Post::create($request->all());
        if ($request->file('file')) {
            $url =  Storage::put('public/post', $request->file('file'));
            $post->image()->create([
                'url' => $url
            ]);
        }

        Cache::flush();//borra todas las variables almacenadas en cache 

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.posts.edit', $post)->with('info', 'La post ha sido creada');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize("author", $post); // esta es una policy que creamos para verificar si el usuario es el propietario del post 
        $categories =  Category::pluck('name', 'id');
        // return $categories;

        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize("author", $post);
        if ($request->file('file')) {
            $url = Storage::put('public/post', $request->file('file'));
            if ($post->image) {
                Storage::delete($post->image->url);
                $post->image->update([
                    'url' => $url
                ]);
            } else {
                $post->image->create([
                    'url' => $url
                ]);
            }
        }
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }
        Cache::flush();//borra todas las variables almacenadas en cache 
        return redirect()->route('admin.posts.edit', $post)->with('info', 'La post ha sido actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize("author", $post);//esto es para validar que el usuario tiene este permiso
        $post->delete();
        Cache::flush();//borra todas las variables almacenadas en cache 
        return redirect()->route('admin.posts.index', $post)->with('info', 'La post ha sido eliminada');
    }
}

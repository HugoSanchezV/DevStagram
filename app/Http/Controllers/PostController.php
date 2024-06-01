<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function index(User $user)
    {

        $posts = Post::where('user_id', $user->id)->paginate(20);

        return view('dashboard',  [
            'user' => $user,
            'posts' => $posts
        ]);
    }


    public function create(User $user)
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'img' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $request->img,
            'user_id' => auth()->user()->id
        ]);


        // tambien se puede 
        // creando objeto y agregando los datos hasta crear
        // o 
        //
        // Este cuando ya este creada la relacion 
        // debido a que usa el metodo de la realacion 'posts'
        //
        //   $request->user()->posts()->create([
        //    datos del como en el primer almacenamietno 
        // ]);
        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post)
    {   
        Gate::authorize('delete', $post);
        
        $post->delete();

        $image_path = public_path('uploads/' . $post->img);

        if (File::exists($image_path)) {
            unlink($image_path);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}

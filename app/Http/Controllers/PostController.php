<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all(); // MO dan barchasini olibkelish

        return view('posts.index')->with('posts', $posts);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }




    public function show(Post $post)
    {
        // $post = Post::find($id); pod kapotom
        // $post;

        // return view('posts.show')->with('post', $post);

        /* return view('posts.show')->with([
            'post' => $post,
            'recent_posts' => Post::latest()->whereNot('id', $post->id)->take(5)->get()
        ]); */

        /* return view('posts.show')->with([
                'post' => $post,
                'recent_posts' => Post::latest()->where('id', '!=', $post->id)->take(4)->get()
        ]); */

        return view('posts.show')->with([
            'post' => $post,
            'recent_posts' => Post::latest()->get()->except($post->id)->take(5) // obshiy ol keyin 5 tasini chiqar (xato)
        ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

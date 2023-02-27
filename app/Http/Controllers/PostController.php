<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
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
        return view('posts.create');
    }


    public function store(StorePostRequest $request)
    {
        /* $request->validate([
            Bu yerda kodlar soni oshib ketmaskigi ushun validatsiyani request->... yozamiz
        ]);
         */

        /* photo kelib post-photos ga tushadi
         $path = $request->file('photo')->store('post-photos', 'public');
         $path = Storage::putFile('photo', $request->file('post-photo', 'public')); */

        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name, 'public');
        }

        $post = Post::create([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? null,
        ]);

        return redirect()->route('posts.index');
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

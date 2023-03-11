<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Events\PostCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Mail\PostCreated as MailPostCreated;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostCreated as NotificationsPostCreated;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
       /*  $this->authorizeResource(Post::class, "post"); // bu xolatda Gate lat kerakmas, Policy ra return true; bolsin */
    }

    public function index()
    {
        // $posts = Post::latest()->paginate(9); // MO dan oxirgi 3 tadan olibkelish
        $posts = Cache::remember('posts', now()->addSeconds(30), function () { // casheda bolsa opke
            return Post::latest()->get(); // yoq bolsa orniga qoy
        });

        return view('posts.index')->with('posts', $posts);
    }


    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }


    public function store(StorePostRequest $request)
    {


        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name, 'public');
        }

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? null,
        ]);

        if(isset($request->tags)){
            foreach ($request->tags as $tag){
                $post->tags()->attach($tag);
            }
        }

        PostCreated::dispatch($post);

        Mail::to($request->user())->send(new MailPostCreated($post));

        // auth()->user()->notify(new NotificationsPostCreated($post));
        Notification::send(auth()->user(), new NotificationsPostCreated($post));

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

        return view('posts.show')->with([
            'post' => $post,
            'recent_posts' => Post::latest()->get()->except($post->id)->take(5), // obshiy ol keyin 5 tasini chiqar (xato)
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }


    public function edit(Post $post) // bo'glash
    {
        /* if (!Gate::allows('update-post', $post)) {
            abort(403);
        } */
        /* Gate::authorize('update-post', $post); */

       /*  Gate::authorize('update', $post); */
         $this->authorize('update', $post);

        return view('posts.edit')->with(['post' => $post]);
    }


    public function update(StorePostRequest $request, Post $post) // bo'glash
    {
        /* if (!Gate::allows('update-post', $post)) {
            abort(403);
        } */
       /*  Gate::authorize('update-post', $post); */

        /* Gate::authorize('update', $post); */
        $this->authorize('update', $post);

        if ($request->hasFile('photo')) {

            if (isset($post->photo)) {
                Storage::delete($post->photo);
            }

            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name, 'public');
        }

        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? $post->photo,
        ]);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }


    public function destroy(Post $post)
    {

        if (isset($post->photo)) {
            Storage::delete('public/'.$post->photo);
        }

        $post->delete();

        return redirect()->route('posts.index');
    }
}

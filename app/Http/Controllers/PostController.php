<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public function __construct(){
//            # only authorized users can use these action
//            $this->middleware("auth");
//    }
    public function index()
    {
        //
        $posts= Post::all();
        return view("posts.index",["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        #user --> hasmany posts
        #post--> belongs to one user

        #logged in user --> post_author
//        dump($request);
        ####
        $user_id=Auth::id();
//        dd($user_id);
        Post::create([
            "title"=>$request["title"],
            "body"=>$request["body"],
            "user_id"=>$user_id
        ]);

        return redirect(route("posts.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

//            dd($post);
//            dd($post["user"]);
//            dd($post->user);

        return view("posts.show",["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view("posts.edit",["post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
//        dd($request,$post);
        $post->update([
            "title"=>$request["title"],
            "body"=>$request["body"]
        ]);
        return redirect(route("posts.show",["post"=>$post]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect(route("posts.index"));
    }
}

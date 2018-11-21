<?php

namespace App\Http\Controllers\Author;

use App\Notifications\NewAuthorPost;
use Illuminate\Support\Facades\Notification;
use App\post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tag;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::User()->posts()->latest()->get();
        return view('author.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('author.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required',
            'body'=>'required'
        ]);
       $slug = str_slug($request->input('title'));
       if ($request->hasFile('image')) {
           $photo = $request->file('image')->getClientOriginalName();
           $destination = public_path() . '/uploads/';  
           $request->file('image')->move($destination, $photo);  
       }
       $post = new Post();
       $categories = Category::all();
       $tags = Tag::all();
       $posts = Post::latest()->get();
       $post->user_id = Auth::id();
       $post->title = $request->title;
       
       $post->slug = $slug;
       $post->image = $photo;
       $post->body = $request->body;
       if(isset($request->status)){
           $post->status = true;
       }else{
           $post->status = false;
       }
       $post->is_approved = false;
       $post->save();
       $posts = Post::all();

       $users = User::where('role_id','1')->get();
       Notification::send($users,new NewAuthorPost($post));
       
       return view('author.post.index',compact('posts','categories','tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
}

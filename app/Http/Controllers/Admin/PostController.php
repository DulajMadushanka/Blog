<?php

namespace App\Http\Controllers\Admin;
use App\Notifications\NewPostNotify;
use Illuminate\Support\Facades\Notification;

use App\Post;
use App\Category;
use App\Tag;
use App\Subscriber;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index',compact('posts'));
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
        return view('admin.post.create',compact('categories','tags'));
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
        $post->cat_id = $request->categores;
        
        
        $post->slug = $slug;
        $post->image = $photo;
        $post->body = $request->body;
        if(isset($request->status)){
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();
        // $subscribers = Subscriber::all();
       
        // foreach($subscribers as $subscriber){
        //     $email = $subscriber->email;
        //     $posts = Post::all();
        //     Notification::route('mail', $email)->notify(new NewPostNotify($posts));
        //     //Notification::send($subscriber->email,new NewPostNotify($post));
        // }
        $posts = Post::all();
        return view('admin.post.index',compact('posts','categories','tags'));
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //return $post;
       // return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    public function pending(){
        $posts = Post::where('is_approved',false)->get();
        return view('admin.post.pending',compact('posts'));
    }

    public function approval($id){
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

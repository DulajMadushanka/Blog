<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Session;

class SinglepageController extends Controller
{
    public function index(){
        $posts = Post::all();
        $post = Post::paginate(6);
        return view('posts',compact('post','posts'));
    }
    public function details($slug){
        $post = Post::where('slug',$slug)->first();
        $blogKey = 'blog_' . $post->id;
        if(!Session::has($blogKey)){
            $post->increment('view_count');
            Session::put($blogKey,1);
        }
        $tags = Tag::all();
        $categorys = Category::all();
        $randomposts = Post::all()->random(3);
        return view('post',compact('post','tags','categorys','randomposts'));
    }
}

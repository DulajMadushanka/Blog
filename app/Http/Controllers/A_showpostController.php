<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Auth;

class A_showpostController extends Controller
{
    public function showPost($id){
        $post = Post::find($id);
        $tag = Tag::all();
        $category = Category::all();
      
        if($post->user_id != Auth::id()){
            return redirect()->back();
            //toast massage
        }
        else{
            return view('author.post.show',compact('post','tag','category'));
        }
       
       
    }
}

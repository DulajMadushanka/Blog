<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostShowController extends Controller
{
    public function showPost($id){
        $post = Post::find($id);
        $tag = Tag::all();
        $category = Category::all();
       
        return view('admin.post.show',compact('post','tag','category'));
    }
}

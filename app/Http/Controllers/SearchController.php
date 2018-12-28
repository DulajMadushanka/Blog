<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class SearchController extends Controller
{
    public function search(Request $request){
       
        $query = $request->input('query');
        $categories = Category::where('slug',$query)->get();
       
        // echo "<pre>";
        // var_dump($categories);
        //$cat = $categories[0]['image'];
        // echo "</pre>";
        // exit;
        
        $posts = Post::where('title','LIKE',"%$query%")->approved()->published()->get();
        return view('search',compact('posts','query','categories'));
    }
}

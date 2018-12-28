<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthorController extends Controller
{
    public function index(){
        $authors = User::authors()
            ->withCount('posts')
            ->withCount('comments')
            ->withCount('favourite_posts')
            ->get();
        return view('admin.authors',compact('authors'));    
    }

    public function destroy(Request $request,$id){
       
        User::where('id',$id)->delete();
        $authors = User::authors()
        ->withCount('posts')
        ->withCount('comments')
        ->withCount('favourite_posts')
        ->get();
    return view('admin.authors',compact('authors'));    
       
    }
}

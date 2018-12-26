<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::latest()->get();
        return view('admin.comments',compact('comments'));
    }
    public function destroy(Request $request,$id){
        Comment::where('id',$id)->delete();
        $comments = Comment::latest()->get();
        return view('admin.comments',compact('comments'));
       
    }
   

}

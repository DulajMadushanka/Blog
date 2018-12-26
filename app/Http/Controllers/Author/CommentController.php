<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Comment;

class CommentController extends Controller
{
    public function index(){
        $posts = Auth::user()->posts;
        return view('author.comments',compact('posts'));
    }
    public function destroy(Request $request,$id){
        $posts = Auth::user()->posts;
        $comment = Comment::findOrFail($id);
        if($comment->post->user->id == Auth::id()){
            $comment->delete();
            //Toastr::success('Comment Successfuly Deleted','Success');
        }else{
            //Toastr::error('Comment not Successfuly Deleted : (','Access Denied !!!');
        }
        
        return view('author.comments',compact('posts'));
       
    }
}

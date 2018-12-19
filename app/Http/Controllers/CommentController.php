<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request,$post){
        $this->validate($request,[
            'comment'=>'required'
        ]);

        $comment = new Comment();
        $comment->post_id = $post;
        $comment->user_id = Auth::id(); 
        $comment->comment = $request->comment;
        $comment->save();
        //Toastr::success('Comment successfully published','Success');
        return redirect()->back();
    }
}

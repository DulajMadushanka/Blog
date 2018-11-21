<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Auth;


class A_postController extends Controller
{
    public function editPost($id){
        $posts = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        if($post->user_id != Auth::id()){
            return redirect()->back();
            //toast massage
        }
        else{
        
            return view('author.post.edit',compact('categories','tags','posts'));
        }
    }
    public function updatePost(Request $request,$id){
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required',
            'body'=>'required'
        ]);
        $post = new Post;
        $slug = str_slug($request->input('title'));
        if ($request->hasFile('image')) {
            
            $photo = $request->file('image')->getClientOriginalName();
           
            $destination = public_path() . '/uploads/';  
            $request->file('image')->move($destination, $photo);  

        }
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
        $data = array(
            'title'=>$post->title,
            'slug'=>  $post->slug,
            'image'=> $post->image,
            'body'=> $post->body,
            'status' => $post->status,
            'is_approved' => $post->is_approved
        );
        Post::where('id',$id)->update($data);
        return redirect()->route('author.post.index');
    }
    public function deletePost($id){
        if($post->user_id != Auth::id()){
            return redirect()->back();
            
        }
        else{
            Post::where('id',$id)->delete();
            return redirect()->route('author.post.index');
        }
    }
}

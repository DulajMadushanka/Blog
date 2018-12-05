<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FavouriteController extends Controller
{
    public function add($post){
       $user = Auth::user();
       $isFavourite = $user->favourite_posts()->where('post_id',$post)->count();

       if($isFavourite == 0){
           $user->favourite_posts()->attach($post);
        //    Toastr::success('Post successfully added to your favourite list :','Success');
           return redirect()->back();
       }
       else{
            $user->favourite_posts()->detach($post);
        //  Toastr::success('Post successfully removed from your favourite list :','Success');
            return redirect()->back();
       }
    }
   
}

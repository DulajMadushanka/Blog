<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $posts = $user->posts;
        $popular_posts = $user->posts()
            ->withCount('comments')
            ->withCount('favourite_to_users')
            ->orderBy('view_count','desc')
            ->orderBy('comments_count')
            ->orderBy('favourite_to_users_count')
            ->take(5)->get();
        $total_pending_posts = $posts->where('is_approved',false)->count();
        $all_views = $posts->sum('view_count');
        return view('author.dashboard',compact('posts','popular_posts','total_pending_posts','all_views'));
       }
}
